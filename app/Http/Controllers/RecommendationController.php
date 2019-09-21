<?php

namespace App\Http\Controllers;

use App\Knowledge;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class RecommendationController extends Controller
{
    //finder properties - what kind of player, finder want to find
    //product properties - stats player
    //constraint -
    //filter conditions - Mid player -> kill banyak, duit banyak, lane mid. etc

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users.recommendation', compact('players'));
    }


    public function search(Request $request)
    {
        //dd($request);

        //validation code
        $request->validate([
            'player_role' => ['required',Rule::in(['core','support']),],
            'position' => ['required',Rule::in(['carry','mid','offlaner','roamer','support']),],
            'rank' => ['required',Rule::in(['herald','guardian','crusader','archon','legend','ancient','divine','immortal']),],
            'experience' => 'required',
            'tournament' => 'required'
        ]);


        $players = User::all();

        $users = $players->except([auth()->id()]);



         foreach($users as $user){

            $arr = $user->knowledge['player_role'];
           // arsort($arr); sort array ikot number tinggi

            //dd($arr['mid']);

            $flattened = Arr::flatten($arr);

            $b= max($flattened); //cari max value
            //$main_role = $b[0];

            //dd($b);



         }

        return view('users.recommendation', compact('players'));

    }

    // Vc (finder properties/requiremet) =
    //     player role -> core or support (optional = kasi pos apa 1/2/3/4/5)
    //     position -> carry/mid/offlaner or roamer/support (1/2/3/4/5)
    //     rank -> archon -> or more
    //     exp -> yes or no
    //     tournament -> nama tournament apa nak join tu;

    // vprod (product properties) =
    //     name
    //     position = calculate whether dia bayak main support or core (utk optional amik dari input user)
    //     experience = yes/no

    // cr - example:
    //                 player role = core -> position != roamer/support
    //                 player role = support -> position != carry/mid/offlaner

    // cf - example:
    //                 player role = core -> position =  carry/mid/offlaner
    //                 player role = support -> position =  roamer/support
    //                 exp = yes -> experiece = yes

    // cprod - list player yg mematuhi semua constraint

    //buat scheduler untuk generate user tu core or support player.

}
