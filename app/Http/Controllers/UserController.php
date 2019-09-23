<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('id', auth()->id())->get();
        dd($users->toArray());
        return view('users.profile');
    }

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

        return view('users.profile', compact('dotas', 'playerInfos'));
    }

    public function edit(User $user)
    {
        abort_if($user->id !== auth()->id(), 403);
        return view('users.edit', compact('user'));
    }

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

    public function list()
    {
        $users = User::all();
        $filter = DB::table('users')
            ->join('linked_steam_accounts', 'users.id', '=', 'linked_steam_accounts.user_id')
            ->select('users.*')
            ->where('users.id', '!=', auth()->id())
            ->get();

        $players = collect();

        foreach ($filter as $f) {
            $user = $users->find($f->id);
            $players->push($user);
        }
        return view('users.search_result', compact('players'));
    }
}
