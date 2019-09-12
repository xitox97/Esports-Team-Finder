<?php

namespace App\Http\Controllers;


use App\LinkedSteamAccount;
use App\Offer;
use App\Scrimstatus;
use App\Statistic;
use App\Team;
use App\Tournament;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show($player)
    {
        $fetchPlayers =  LinkedSteamAccount::where('dota_id', $player)->firstOrFail();

        return view('users.profile', compact('fetchPlayers'));
    }


    public function steam(){
        return view('auth.steam');
    }

    public function noti(){
        // $id = auth()->user()->id;

        // $offers = Offer::where('user_id', $id)->get();

        // if( Team::where('captain_id', $id)->first() != null){


        // $myTeam = Team::where('captain_id', $id)->first();
        // $myOffers = Offer::where('team_id', $myTeam->id)->get();
        // return view('users.notificationFeedback', compact('offers','myOffers'));

        // }

        // else{
        //     return view('users.notification', compact('offers'));
        // }

      // dd($myOffers);

      //combine response and request. natofication.blade masih ada for backup

      return view('users.notificationFeedback');


    }

    public function notiScrim(){

        $id = auth()->user()->id;
        $receivedTeam = Team::where('captain_id', $id)->first();
        $inviteNotis = Scrimstatus::where('opponent_id', $receivedTeam->id)->get();

        // dd($scrimStatus);

        $senderTeam = Team::where('captain_id', $id)->first();
        $acceptedNoti = Scrimstatus::where('team_id', $senderTeam->id)->get();

        //dd($acceptedNoti->toArray());


        return view('teams.notification', compact('inviteNotis','acceptedNoti'));
    }


    public function adminIndex()
    {
        return view('admins.index');
    }

    public function adminTour()
    {
        $tournament = Tournament::all();

        return view('admins.tourList', compact('tournament'));

    }

    public function stats($player){

        $fetchPlayers =  LinkedSteamAccount::where('dota_id', $player)->firstOrFail();
        $statistics = $fetchPlayers->user->statistic->first();

        //dd($statistics->recent_match);
        return view('users.stats', compact('fetchPlayers','statistics'));
    }
}
