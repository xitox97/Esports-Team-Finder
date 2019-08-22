<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Team;
use App\User;
use Illuminate\Http\Request;

class OfferController extends Controller
{


    public function invite(User $user){

        $id = auth()->user()->id;

        $teams = Team::where('captain_id', $id)->first();

        //dd($teams->captain_id);

       // dd($user->id);




    $offer = Offer::create([
        'team_id' => $teams->id,
        'user_id' => $user->id,
        'status' => 'pending',
    ]);

   dd($offer);

    // return redirect("teams/$path");

    }

    public function acceptOffer(Offer $offer){
        //dd($offer);

        $user = auth()->user();

        //$offers = Offer::where('user_id', $user->id)->get();


        $accept = $user->team()->attach($offer->team_id);


        $offer->status = 'Accepted';

        $offer->save();
        //dd($accept);




    }

    public function rejectOffer(Offer $offer){


        $user = auth()->user();




        $offer->status = 'Rejected';
        $offer->save();
        //dd($accept);


    }
}
