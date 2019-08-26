<?php

namespace App\Http\Controllers;

use App\Scrimstatus;
use App\Team;
use Illuminate\Http\Request;

class ScrimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::where('scrim', true)->get(); //get team that want to scrim




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

        return redirect('/scrims');

    }

    public function acceptScrim($statusID){

        $scrimstatus = Scrimstatus::find($statusID)->first();
        //dd($scrimstatus);
        $id = auth()->user()->id;
        $myTeam = Team::where('captain_id', $id)->first();
    //$scrimStatus = Scrimstatus::where('opponent_id', $myTeam->id)->first();

    //$scrim

        //$myTeam->scrims()->attach($scrim->team_id);

        $myTeam->scrims()->attach($scrimstatus->team_id, ['date_time' => $scrimstatus->date_time]);

        $opponentTeam = Team::where('id', $scrimstatus->team_id)->first();

        $opponentTeam->scrims()->attach($scrimstatus->opponent_id, ['date_time' => $scrimstatus->date_time]);

        $scrimstatus->status = 'Accepted';
        $scrimstatus->save();

        return back()->with('success', 'Scrims added to schedule');





    }

    public function rejectScrim(){






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
