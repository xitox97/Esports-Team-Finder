@extends('layouts.app')

@section('content')
    <section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / Overview / <a href="{{url('/players/' . $fetchPlayers->dota_id)}}"
        class="no-underline hover:underline text-blue-500">{{$fetchPlayers->user->name}}</a></span>
    </section>

    <!--topsection-->
        <div class="container mx-auto w-full mt-4 rounded-lg pt-3 pl-3 px-5">
            <div class="flex">
                <div class="flex w-3/4">
                    <div class="flex">
                        <img src="{{  $fetchPlayers->avatar_url  }}" class="rounded-full shadow-lg w-32" alt="...">
                        <div class="ml-6">
                        <p class="text-lg font-bold">{{  $fetchPlayers->steam_name  }}</p>
                        <p class="text-md font-bold">Wins: {{  $fetchPlayers->win_lose['win']  }}</p>
                        <p class="text-md font-bold">Losses:{{  $fetchPlayers->win_lose['lose']  }}</p>
                        <p class="text-md font-bold">Winrate: {{  round(($fetchPlayers->win_lose['win'] / ($fetchPlayers->win_lose['win'] +
                                $fetchPlayers->win_lose['lose'])) * 100, 2)  }} %</p>
                        </div>
                    </div>


                </div>
                <div class="w-1/4">
                    @include('users.medal')</div>

                </div>
                <div class="flex justify-center border-b-2 border-gray-300 -pb-5 mt-4">
                        <a href="{{ url('/players/' . $fetchPlayers->dota_id ) }}/stats" class="text-md font-medium text-indigo-500 mr-20 hover:text-indigo-600
                         {{Request::is('players/'.$fetchPlayers->dota_id.'/stats') ? 'border-b-2 border-purple-500 pb-3' : ''}}">Overview</a>
                        <a href="{{ url('/players/' . $fetchPlayers->dota_id ) }}/heroes" class="text-md font-medium text-indigo-500 mx-10 hover:text-indigo-600
                        {{Request::is('players/'.$fetchPlayers->dota_id.'/heroes') ? 'border-b-2 border-purple-500 pb-3' : ''}}">Heroes</a>
                        <a href="{{ url('/players/' . $fetchPlayers->dota_id ) }}/totals" class="text-md font-medium text-indigo-500 ml-20 hover:text-indigo-600
                        {{Request::is('players/'.$fetchPlayers->dota_id.'/totals') ? 'border-b-2 border-purple-500 pb-3' : ''}}">Totals</a>
                    </div>
                </div>
            <!--stats section-->
            <div class="container mx-auto w-full mt-4 px-5">
                <p class="text-2xl font-semibold text-indigo-700">Recent Matches</p>
                <div class="bg-white rounded-lg  p-4">
                    <table class="border-collapse w-full">
                            <thead class="text-gray-600">
                                <tr>
                                    <th class="text-left capitalize border-b border-gray-300 py-4">Hero</th>
                                    <th class="text-left capitalize border-b border-gray-300 py-4">Result</th>
                                    <th class="text-left capitalize border-b border-gray-300 py-4">Game Mode</th>
                                    <th class="text-left capitalize border-b border-gray-300 py-4">Score (K/D/A)</th>
                                    <th class="text-left capitalize border-b border-gray-300 py-4">Duration</th>
                                    <th class="text-left capitalize border-b border-gray-300 py-4"></th>
                                </tr>
                            </thead>
                            <tbody class="">
                                <tr class="mb-3 cursor-wait text-center" ><td colspan="5"  > <p class="font-semibold text-lg  mt-5 ">Fetching data... Comeback back again in minutes</p></td>
                                </tr>
                            </tbody>
                    </table>
                    <div class="mt-4">
                    </div>
                </div>
            </div>
@endsection
