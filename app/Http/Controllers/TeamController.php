<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$teams = DB::table('teams')->get();

        $myTeam = Auth()->user()->team->first();
        //dd($myTeam->id);

        $players = DB::table('user_team')->where('team_id', $myTeam->id)->get();
        //dd($players);
        $userid = Arr::pluck($players, 'user_id');
        $teamMembers = User::find($userid);

        return view('teams.myteam', compact('myTeam', 'teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->user()->id;

        return view('teams.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'captain_id' => 'required',
            'name' => 'required',
            'area' => 'required',
            'qtty_member' => 'required',
            'image' => 'required|image|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid() . '.' . $ext;
            $image->storeAs('public/pics', $filename);
            $request->image = $filename;
        }


        //dd($request->image);
        try {
            $team = Team::create([
                'captain_id' => $request['captain_id'],
                'name' => $request['name'],
                'area' => $request['area'],
                'qtty_member' => $request['qtty_member'],
                'image' => $request->image
            ]);

            //dd($team->id);

            $user = auth()->user();
            $user->team()->attach($team->id);

            $path = $team->id;
            return redirect("teams/$path");
        } catch (\Illuminate\Database\QueryException $e) {

            return back()->withError('You must leave your current team first before creating new one!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {

        return view('teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $id = auth()->user()->id;

        if ($id == $team->captain_id) {

            $team->delete();
        } else {
            return back()->with('cannot', 'Only Captain can delete team');
        }
        return redirect('/home');
    }

    public function readyScrim(Team $team)
    {
        $id = auth()->user()->id;

        // if($id == $team->captain_id){

        // $team->delete();
        //     }
        // else{
        //     return back()->with('cannot', 'Only Captain can delete team');
        // }

        $team->scrim = true;
        $team->save();

        return back();
    }

    public function notReadyScrim(Team $team)
    {
        $id = auth()->user()->id;
        $team->scrim = false;
        $team->save();

        return back();
    }
}
