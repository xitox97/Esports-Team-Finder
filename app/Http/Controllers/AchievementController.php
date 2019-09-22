<?php

namespace App\Http\Controllers;

use App\LinkedSteamAccount;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index($player)
    {


        $steam = LinkedSteamAccount::where('dota_id', $player)->first();
        $users = $steam->user;

       // $achievements = $users->achievements;
        //dd($achievements);
       //$achievements = auth()->user()->achievements;

        return view('users.achievement.index', compact('users'));
    }

    public function create()
    {
        $id = auth()->user()->accounts->dota_id;
        return view('users.achievement.create', compact('id'));
    }

    public function store(Request $request)
    {
        //dd($request);

        $request->validate([
            'tournament_name' => 'required',
            'date' => 'required',
            'place' => 'required',
            'team' => 'required'
        ]);

        //dd(auth()->user());

        $achievement = auth()->user()->achievements()->create([
            'tournament_name' => $request['tournament_name'],
            'date' => $request['date'],
            'place' => $request['place'],
            'team' => $request['team'],
        ]);

        $id = auth()->user()->accounts->dota_id;

        return redirect('/players/' . $id . '/achievements');
    }
}
