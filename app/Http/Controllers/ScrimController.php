<?php

namespace App\Http\Controllers;

use App\Notifications\AcceptScrim;
use App\Notifications\OfferScrim;
use App\Notifications\RejectScrim;
use App\Scrimstatus;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class ScrimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$teams = Team::where('scrim', true)->get(); //get team that want to scrim

        $id = auth()->user()->id;
        $myTeam = Team::where('captain_id', $id)->first();


        $teams = Team::where('scrim', true)->get()->except($myTeam->id);


        return view('scrims.index', compact('teams'));
    }

    public function add(Team $team){

        $id = auth()->user()->id;
        $myTeam = Team::where('captain_id', $id)->first();
        return view('scrims.add', compact('team','myTeam'));
    }

    public function invite(Request $request){

        $request->validate([
            'team_id' => 'required',
            'opponent_id' => 'required',
            'date_time' => 'required',
        ]);



        $inviteScrim = Scrimstatus::create([
        'team_id' => $request['team_id'],
        'opponent_id' => $request['opponent_id'],
        'status' => 'pending',
        'date_time' => $request['date_time']
        ]);

        $team = Team::where('id', $request['opponent_id'])->first();

        $user = User::where('id', $team->captain_id)->first();
        //dd($user);
        $user->notify(new OfferScrim($inviteScrim));

        return redirect('/scrims');

    }

    public function acceptScrim(Scrimstatus $status, DatabaseNotification $noti){




        $id = auth()->user()->id;
        $myTeam = Team::where('captain_id', $id)->first();


        $myTeam->scrims()->attach($status->team_id, ['date_time' => $status->date_time]);

        $opponentTeam = Team::where('id', $status->team_id)->first();

        $opponentTeam->scrims()->attach($status->opponent_id, ['date_time' => $status->date_time]);

        $status->status = 'Accepted';
        $status->save();

        $sender = User::where('id', $opponentTeam->captain_id)->first();

        $sender->notify(new AcceptScrim($status,$myTeam));
        $noti->delete();
        return back()->with('success', 'Scrims added to schedule');





    }

    public function rejectScrim(Scrimstatus $status, DatabaseNotification $noti){

            $id = auth()->user()->id;
            $myTeam = Team::where('captain_id', $id)->first();

            $status->status = 'Rejected';
            $status->save();

            $opponentTeam = Team::where('id', $status->team_id)->first();

            $sender = User::where('id', $opponentTeam->captain_id)->first();

            $sender->notify(new RejectScrim($status,$myTeam));
            $noti->delete();
            return back()->with('reject', 'Scrims is not added to schedule');



    }

    public function scrimList(){

        $id = auth()->user()->id;
        $myTeam = Team::where('captain_id', $id)->first();


       // $scrimTable = Scrimstatus::where('team_id', $myTeam->id)->get();

        //dd($myTeam);
        return view('scrims.scrimlist', compact('myTeam'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
