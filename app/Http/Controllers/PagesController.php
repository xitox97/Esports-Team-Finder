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

       // dd($offers);

        return view('users.notification', compact('offers'));
    }

    public function notiScrim(){

        $id = auth()->user()->id;
        $myTeam = Team::where('captain_id', $id)->first();
        $scrimStatus = Scrimstatus::where('opponent_id', $myTeam->id)->first();

        // dd($scrimStatus);

        return view('teams.notification', compact('scrimStatus'));
    }
}
