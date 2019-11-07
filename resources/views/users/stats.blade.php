@extends('layouts.app')

@section('content')
    <section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm text-white font-medium tracking-wide">Home / Overview / <a href="{{url('/players/' . $fetchPlayers->dota_id)}}"
        class="no-underline hover:underline text-blue-500">{{$fetchPlayers->user->name}}</a></span>
    </section>

    <!--topsection-->
        <div class="bg-dark-100 container mt-4 mx-auto p-4 rounded-lg w-full font-mono">
            <div class="flex">
                <div class="flex w-3/4">
                    <div class="flex">
                        <img src="{{  $fetchPlayers->avatar_url  }}" class="rounded-full shadow-lg w-32 border-purple-700 border-2" alt="...">
                        <div class="ml-6">
                        <p class="text-lg font-bold text-white">{{  $fetchPlayers->steam_name  }}</p>
                        <p class="text-md font-bold text-white">Wins: {{  $fetchPlayers->win_lose['win']  }}</p>
                        <p class="text-md font-bold text-white">Losses: {{  $fetchPlayers->win_lose['lose']  }}</p>
                        <p class="text-md font-bold text-white">Winrate: {{  round(($fetchPlayers->win_lose['win'] / ($fetchPlayers->win_lose['win'] +
                                $fetchPlayers->win_lose['lose'])) * 100, 2)  }} %</p>
                        </div>
                    </div>


                </div>
                <div class="w-1/4">
                    @include('users.medal')</div>

                </div>
                <div class="border-b border-gray-600 flex justify-center mt-4 pb-4">
                        <a href="{{ url('/players/' . $fetchPlayers->dota_id ) }}/stats" class="text-md font-medium mr-20 hover:underline
                         {{Request::is('players/'.$fetchPlayers->dota_id.'/stats') ? 'text-white border-b-2 border-purple-500 pb-2' : 'text-gray-400'}}">Overview</a>
                        <a href="{{ url('/players/' . $fetchPlayers->dota_id ) }}/heroes" class="text-md font-medium mx-10 hover:underline
                        {{Request::is('players/'.$fetchPlayers->dota_id.'/heroes') ? 'text-white border-b-2 border-purple-500 pb-2' : 'text-gray-400'}}">Heroes</a>
                        <a href="{{ url('/players/' . $fetchPlayers->dota_id ) }}/totals" class="text-md font-medium ml-20 hover:underline
                        {{Request::is('players/'.$fetchPlayers->dota_id.'/totals') ? 'text-white border-b-2 border-purple-500 pb-2' : 'text-gray-400'}}">Totals</a>
                    </div>
                </div>
            <!--stats section-->
            <div class="container mt-4 mx-auto w-full font-mono">
                <p class="text-2xl font-semibold text-purple-600">Recent Matches</p>
                <div class="bg-dark-100 p-4 rounded-lg">
                    <table class="border-collapse w-full">
                            <thead class="text-white">
                                <tr>
                                    <th class="text-left capitalize border-b border-gray-300 py-4">Hero</th>
                                    <th class="text-left capitalize border-b border-gray-300 py-4">Result</th>
                                    <th class="text-left capitalize border-b border-gray-300 py-4">Game Mode</th>
                                    <th class="text-left capitalize border-b border-gray-300 py-4">Score (<span class="text-green-600">K</span>/
                                        <span class="text-red-600">D</span>/<span class="text-gray-600">A</span>)</th>
                                    <th class="text-left capitalize border-b border-gray-300 py-4">Duration</th>
                                    <th class="text-left capitalize border-b border-gray-300 py-4"></th>
                                </tr>
                            </thead>
                            <tbody>
                                    @if ($pageStats != null)
                                    @foreach ($pageStats as $recent)
                                              <tr  class="py-4 px-6 border-b border-gray-300 hover:bg-content text-white">
                                                <td class="text-center"> @include('users.heroes')</td>
                                                <td>
                                                    @php
                                                        if($recent['player_slot'] >= 0 && $recent['player_slot'] <= 127)
                                                            {
                                                                $position = 'Radiant';
                                                            }
                                                        else {
                                                            $position =  'Dire';
                                                        }
                                                        if($recent['radiant_win'] == true && $position == 'Radiant')
                                                            {
                                                                $result = 'Won Match';
                                                            }
                                                        elseif ($recent['radiant_win'] == false && $position == 'Dire') {
                                                                $result = 'Won Match';
                                                            }
                                                        else {
                                                                $result = 'Lost Match';
                                                            }
                                                    @endphp

                                                <a href="{{ url('matches/' . $recent['match_id']) }}"><p class="{{ $result == 'Won Match' ? 'text-green-500' : 'text-red-500' }} hover:underline font-semibold">
                                                    {{ $result}} </p></a>


                                                </td>
                                                <td> @include('users.gameMode')</td>
                                                <td class="font-semibold"><span class="text-green-600">{{ $recent['kills'] }}</span>/
                                                    <span class="text-red-600">{{ $recent['deaths'] }}</span>/<span class="text-gray-600">{{ $recent['assists'] }}</span></td>
                                                <td>@php
                                                        $minutes=$recent['duration'];
                                                        $hours = intdiv($minutes, 60).':'. ($minutes % 60);
                                                        echo $hours;
                                                    @endphp
                                                    <br>
                                                   {{ $position }}
                                                </td>
                                                <td><a href="{{ url('matches/' . $recent['match_id']) }}"><i class="material-icons text-indigo-600 cursor-pointer md-48">
                                                        pageview
                                                        </i></a></td>
                                                </tr>
                                @endforeach

                                @endif

                            </tbody>
                    </table>
                    <div class="mt-4 p-2">
                        {{ $pageStats->links() }}
                    </div>
                </div>
            </div>
@endsection
