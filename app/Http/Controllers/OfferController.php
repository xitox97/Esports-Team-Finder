<?php

namespace App\Http\Controllers;

use App\Notifications\AcceptOffer;
use App\Notifications\OfferTeam;
use App\Notifications\RejectOffer;
use App\Offer;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\DB;

class OfferController extends Controller
{


    public function invite(User $user)
    {

        $id = auth()->user()->id;


        //check ada team or tidak
        $exists = DB::table('user_team')
            ->whereUserId($id)
            ->whereTeamId(2)
            ->count() > 0;

        if ($exists == false) {
            return back()->with('team', 'You need to create Team first!');
        }

        $teams = Team::where('captain_id', $id)->first();

        //check captain or not
        if ($teams == null) {
            return back()->with('captain', 'Only Captain can invite players!');
        }

        $offer = Offer::create([
            'team_id' => $teams->id,
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        //send email notification just buang comment utk enable
        $user->notify(new OfferTeam($offer, $teams));

        return back()->with('offer', 'Offer has been sent!');



        // return redirect("teams/$path");

    }

    public function acceptOffer(Offer $offer, DatabaseNotification $noti)
    {

        $user = auth()->user();
        $sender = User::where('id', $offer->team->captain_id)->first();

        //dd($noti);

        try {

            $user->team()->attach($offer->team_id);
            $offer->status = 'Accepted';
            $offer->save();

            $sender->notify(new AcceptOffer($offer));

            $noti->delete();

            return back()->with('success', 'Successfully Joined');
        } catch (\Illuminate\Database\QueryException $e) {
            //dd('You must exit your team first before joining another team');
            return back()->withError('You must exit your team first before joining another team');
        }
    }

    public function rejectOffer(Offer $offer, DatabaseNotification $noti)
    {

        $sender = User::where('id', $offer->team->captain_id)->first();
        $offer->status = 'Rejected';
        $sender->notify(new RejectOffer($offer));
        $offer->save();
        $noti->delete();
        return back()->with('reject', 'You has reject the offer');
        //dd($accept);
    }

    public function leaveTeam(Team $team)
    {

        $user = auth()->user();

        if ($user->id == $team->captain_id) {
            return back()->with('leave', 'Captain can only delete team!');
        } else {
            $user->team()->detach($team->id);
            return back()->with('leave', 'Successfully left!');
        }
    }


    public function deleteNoti(DatabaseNotification $noti)
    {
        $noti->delete();
        return back();
    }
}
