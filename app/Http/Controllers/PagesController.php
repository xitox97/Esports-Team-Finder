<?php

namespace App\Http\Controllers;

use App\LinkedSocialAccount;
use App\Offer;
use App\Scrimstatus;
use App\Team;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show($player)
    {

    //     $dotas = auth()->user();
    //     //dd($dotas->accounts->dota_id);
    //     //dd($dotas->accounts->toArray()); keluarkan accounts

    //     $player_id = $dotas->accounts->dota_id;

    //     $client = new Client(['base_uri'
    //  => 'https://api.opendota.com/api/']);

    //  $response = $client->get("players/$player");
    //  $fetchPlayers = json_decode($response->getBody(), true);

    // //dd($playerInfos);
    // //  dd(json_decode($response->getBody(), true));

    //     return view('users.profile', compact('dotas','playerInfos'));


    $fetchPlayers =  LinkedSocialAccount::where('dota_id', $player)->firstOrFail();
    //dd($test->user); //pangill user that belongs to this account

    // dd($fetchPlayers->toArray());


    //$ownerPlayers = $fetchPlayers->user;
    return view('users.profile', compact('ownerPlayers','fetchPlayers'));
    }


    public function steam(){
        return view('auth.steam');
    }

    public function noti(){
        $id = auth()->user()->id;

        $offers = Offer::where('user_id', $id)->get();

        if( Team::where('captain_id', $id)->first() != null){


        $myTeam = Team::where('captain_id', $id)->first();
        $myOffers = Offer::where('team_id', $myTeam->id)->get();
        return view('users.notificationFeedback', compact('offers','myOffers'));

        }

        else{
            return view('users.notification', compact('offers'));
        }

      // dd($myOffers);




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
}
