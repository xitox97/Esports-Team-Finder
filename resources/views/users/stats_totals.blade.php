@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
        <span class="italic text-sm">Home / Overview / <a href="{{url('/players/' . $fetchPlayers->dota_id)}}"
            class="no-underline hover:underline text-blue-500">{{$fetchPlayers->user->name}}</a> / Totals</span>
        </section>

        <!--topsection-->
            <div class="container mx-auto w-full mt-4 rounded-lg pt-3 pl-3">
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

                <div class="container mx-auto w-full mt-4">
                    <p class="text-2xl font-semibold text-indigo-700 text-center">All Matches</p>
                    <div class="flex flex-wrap rounded-lg p-4 justify-center">
                        @if ($statistics != null)
                            @foreach ($statistics->tot_score as $recent)
                            @if ($recent['field'] == 'kills')
                                <div class="mini-card">
                                    <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                            {{$recent['field']}}
                                    </div>
                                    <div class="text-center font-semibold">
                                        {{$recent['sum']}}

                                    </div>


                                </div>
                            @elseif($recent['field'] == 'deaths')
                            <div class="mini-card">
                                    <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                            {{$recent['field']}}
                                    </div>
                                    <div class="text-center font-semibold">
                                        {{$recent['sum']}}

                                    </div>


                                </div>
                                @elseif($recent['field'] == 'assists')
                                <div class="mini-card">
                                        <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                {{$recent['field']}}
                                        </div>
                                        <div class="text-center font-semibold">
                                            {{$recent['sum']}}

                                        </div>


                                    </div>
                                    @elseif($recent['field'] == 'last_hits')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>
                                            <div class="text-center font-semibold">
                                                {{$recent['sum']}}

                                            </div>


                                    </div>
                                    @elseif($recent['field'] == 'denies')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>
                                            <div class="text-center font-semibold">
                                                {{$recent['sum']}}

                                            </div>


                                    </div>
                                    @elseif($recent['field'] == 'duration')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                @php
                                                    $days = (int)($recent['sum']/86400);
                                                    $rdays = ($recent['sum']-($days*86400));
                                                    $hours = (int)($rdays/3600);
                                                    $rhours = ($rdays-($hours*3600));
                                                    $minutes = (int)($rhours/60);
                                                @endphp
                                                    {{$recent['field']}}
                                            </div>
                                            <div class="text-center font-semibold">
                                                {{$days}}D : {{$hours}}H : {{$minutes}}M

                                            </div>


                                    </div>
                                    @elseif($recent['field'] == 'level')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>
                                            <div class="text-center font-semibold">
                                                {{$recent['sum']}}

                                            </div>


                                    </div>
                                    @elseif($recent['field'] == 'hero_damage')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>
                                            <div class="text-center font-semibold">
                                                {{$recent['sum']}}

                                            </div>


                                    </div>
                                    @elseif($recent['field'] == 'tower_damage')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>
                                            <div class="text-center font-semibold">
                                                {{$recent['sum']}}

                                            </div>


                                    </div>
                                    @elseif($recent['field'] == 'hero_healing')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>
                                            <div class="text-center font-semibold">
                                                {{$recent['sum']}}

                                            </div>


                                    </div>
                                    @elseif($recent['field'] == 'hero_healing')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>
                                            <div class="text-center font-semibold">
                                                {{$recent['sum']}}

                                            </div>


                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="container mx-auto w-full mt-4">
                        <p class="text-2xl font-semibold text-indigo-700 text-center">Parsed Matches</p>
                        <div class="flex flex-wrap rounded-lg p-4 justify-center">
                                @if ($statistics != null)
                                @foreach ($statistics->tot_score as $recent)
                                    @if ($recent['field'] == 'stuns')
                                        <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>

                                                <div class="text-center font-semibold">{{ round($recent['sum'], 0)}}</div>

                                        </div>
                                    @elseif($recent['field'] == 'tower_kills')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>

                                                <div class="text-center font-semibold">{{$recent['sum']}}</div>

                                    </div>
                                    @elseif($recent['field'] == 'neutral_kills')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>

                                                <div class="text-center font-semibold">{{$recent['sum']}}</div>

                                    </div>
                                    @elseif($recent['field'] == 'courier_kills')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>

                                                <div class="text-center font-semibold">{{$recent['sum']}}</div>

                                    </div>
                                    @elseif($recent['field'] == 'purchase_tpscroll')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>

                                                <div class="text-center font-semibold">{{$recent['sum']}}</div>

                                    </div>
                                    @elseif($recent['field'] == 'purchase_ward_observer')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>

                                                <div class="text-center font-semibold">{{$recent['sum']}}</div>

                                    </div>
                                    @elseif($recent['field'] == 'purchase_ward_sentry')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>

                                                <div class="text-center font-semibold">{{$recent['sum']}}</div>

                                    </div>
                                    @elseif($recent['field'] == 'purchase_gem')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>

                                                <div class="text-center font-semibold">{{$recent['sum']}}</div>

                                    </div>
                                    @elseif($recent['field'] == 'purchase_rapier')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>

                                                <div class="text-center font-semibold">{{$recent['sum']}}</div>

                                    </div>
                                    @elseif($recent['field'] == 'pings')
                                    <div class="mini-card">
                                            <div class="text-center text-indigo-700 font-medium border-b-2 border-gray-200 pb-1 mb-1">
                                                    {{$recent['field']}}
                                            </div>

                                                <div class="text-center font-semibold">{{$recent['sum']}}</div>

                                    </div>

                                    @endif
                                @endforeach
                                @endif

                    </div>
                </div>
@endsection
