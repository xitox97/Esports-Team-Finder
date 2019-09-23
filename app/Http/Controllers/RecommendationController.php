<?php

namespace App\Http\Controllers;


use App\Tournament;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class RecommendationController extends Controller
{
    //finder properties - what kind of player, finder want to find
    //product properties - stats player
    //constraint -
    //filter conditions - Mid player -> kill banyak, duit banyak, lane mid. etc



    public function index()
    {
        $tours = Tournament::all();
        return view('users.recommendation', compact('tours'));
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

        //Constraints (cr)
        //player role = core -> position != roamer/support
        //player role = support -> position != carry/mid/offlaner

        if($request['player_role'] == "core"){

            if($request['position'] == "roamer" or $request['position'] == "support"){
                return back()->with('constraint', 'This position is not for core role');
            }
        }
        elseif($request['player_role'] == "support"){

            if($request['position'] == "carry" or $request['position'] == "mid" or $request['position'] == "offlaner"){
                return back()->with('constraint', 'This position is not for support role');
            }
        }

        //cf = Filter Conditions
        //create past tournament punya page dan continue


        $players = User::all();

        //dekat sini akan ada coding untuk filter user yg pernah join tournament sahaja

        // $admin = User::where('is_admin', 1)->first();
        // $users = $players->except([auth()->id(),$admin->id]);

        $userSteam = DB::table('users')
            ->join('linked_steam_accounts', 'users.id', '=', 'linked_steam_accounts.user_id')
            ->select('users.*')
            ->get();

        $users = collect();

        foreach ($userSteam as $s) {
            $user = $players->find($s->id);
            $users->push($user);
        }



        $result = collect();

         foreach($users as $user){

            $current = $user->knowledge['mid'];
            $role = 'mid';
            if($user->knowledge['carry'] > $current)
            {
                $current = $user->knowledge['carry'];
                $role = 'carry';
            }
            if($user->knowledge['support'] > $current)
            {
                $current = $user->knowledge['support'];
                $role = 'support';
            }
            if($user->knowledge['roamer'] > $current)
            {
                $current = $user->knowledge['roamer'];
                $role = 'roamer';
            }
            if($user->knowledge['offlaner'] > $current)
            {
                $current = $user->knowledge['offlaner'];
                $role = 'offlaner';
            }

            $medal = $user->accounts->getMedal();


            //  echo $role . " ". $current;
            //   echo "<br>";
            //  echo $medal;
            //  echo "<br><br>";

            //coding masukkan user yg sesuai dengan semua dlm collection maybe?

            //cf

            $tour = Tournament::find($request['tournament']);
            $exists = $tour->users->contains($user->id);
            //dd($exists);
            if($request['position'] == $role )
            {
                if($request['rank'] ==  $medal)
                {
                    if($exists == true)
                    {
                        // echo $user->name;
                        // echo "<br>";

                        $result->push($user);


                    }
                }
            }
         }
         //dd($result);
        return view('users.recommendationResult', compact('result'));

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
    //                 player role = core -> position =  carry/mid/offlaner *reserve
    //                 player role = support -> position =  roamer/support *reserve
    //                 exp = yes -> experiece = yes

    // cprod - list player yg mematuhi semua constraint

    //buat scheduler untuk generate user tu core or support player.

}
