<?php

namespace App\Http\Controllers;

use App\location;
use Illuminate\Http\Request;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\QueryException;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->location == null) {
            return view('users.map');
        } else {
            dd('la');
        }
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
    public function store()
    {
        $input = request()->all();
        //dd($input);
        try {
            $loc = new location();
            $loc->coordinate = new Point($input['latitude'], $input['longitude']);    // (lat, lng)
            $loc->user_id = $input['user_id'];
            $loc->address = $input['address'];
            $loc->save();


            return response()->json([
                'status' => 'success',
                'msg'    => 'Okay',
            ], 201);
        } catch (QueryException $exception) {

            return response()->json([
                'status' => 'error',
                'msg'    => 'You already set your location',
                // 'errors' => $exception->errors(),
            ], 422);
        }
        //dd($lol);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(location $location)
    {
        //
    }
}
