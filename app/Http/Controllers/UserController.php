<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::where('id', auth()->id())->get();
        dd($users->toArray());
        return view('users.profile');
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $dotas = auth()->user();
        //dd($dotas->accounts->dota_id);
        //dd($dotas->accounts->toArray()); keluarkan accounts

        $player_id = $dotas->accounts->dota_id;

        $client = new Client(['base_uri'
     => 'https://api.opendota.com/api/']);

     $response = $client->get("players/$player_id");
     $playerInfos = json_decode($response->getBody(), true);

    //dd($playerInfos);
    //  dd(json_decode($response->getBody(), true));

        return view('users.profile', compact('dotas','playerInfos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        abort_if($user->id !== auth()->id(), 403);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        request()->validate([

            'name' => ['required', 'string', 'max:255'],
            'age' => ['required', 'integer'],
            'area' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255']
        ]);


        $user->name = $request['name'];
        $user->age = $request['age'];
        $user->area = $request['area'];
        $user->state = $request['state'];
        $user->save();

        $url = $user->accounts->dota_id;
        return redirect("players/$url");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function list()
    {
        $players = User::all();
        //dd($player);
        return view('users.search_result', compact('players'));


    }
}
