<?php

namespace App\Http\Controllers;

use App\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournament = Tournament::all();

        return view('tournaments.index', compact('tournament'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tournaments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->image);
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'venue' => 'required|alpha',
            'state' => 'required|alpha',
            'prizepool' => 'required|numeric',
            'organizer' => 'required|alpha',
            'image' => 'required|image|max:1999'
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid().'.'.$ext;
            $image->storeAs('public/tour',$filename);
            $request->image = $filename;
        }

       // dd($request->image);


        Tournament::create([
            'name' => $request['name'],
            'start_date' => $request['start_date'],
            'end_date' => $request['end_date'],
            'venue' => $request['venue'],
            'state' => $request['state'],
            'prizepool' => $request['prizepool'],
            'organizer' => $request['organizer'],
            'image' => $request->image
            ]);

        return redirect('/admin/tournaments');
    }

    public function interested(Tournament $tournament)
    {

        $id = auth()->user()->id;

        $tournament->users()->attach($id);

        return back()->with('interest', 'Added to interest list');
    }

    public function notInterested(Tournament $tournament)
    {

        $id = auth()->user()->id;

        $tournament->users()->detach($id);

        return back()->with('notInterest', 'Remove from interest list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        //
    }
}
