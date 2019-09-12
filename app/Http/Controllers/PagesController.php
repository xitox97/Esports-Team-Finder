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

        $fetchPlayers =  LinkedSteamAccount::where('dota_id', $player)->first();


        $statistics = $fetchPlayers->user->statistic;



        return view('users.stats', compact('fetchPlayers','statistics'));
    }
}
