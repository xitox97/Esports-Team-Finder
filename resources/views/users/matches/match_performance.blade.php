@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / <a href="/players/{{$matches->user->accounts->dota_id}}/stats"
        class="no-underline hover:underline text-blue-500">Overview</a> / Farhan</span>
    </section>

    <div class="container ml-24 mt-12">
            @if($matches != null)
        {{-- top --}}
        <div class="flex max-w-6xl justify-between">
            <div class="flex-1">
            @if($matches->match_details['radiant_win'] == true)
                <p class="text-3xl text-green-600 font-semibold tracking-wide">Radiant Victory</p>
            @else
                <p class="text-3xl text-red-600 font-semibold">Dire Victory</p>
            @endif
            </div>
            <div class="flex-1">
                <p class="text-sm font-medium text-center">RANKED MATCH</p>
                <div class="flex justify-center items-center">
                    <p class="text-4xl font-medium text-green-500 mr-10">{{$matches->match_details['radiant_score']}}</p>
                    <p class="text-2xl font-medium text-center">@php
                            $minutes=$matches->match_details['duration'];
                            $hours = intdiv($minutes, 60).':'. ($minutes % 60);
                            echo $hours;
                        @endphp</p>
                    <p class="text-4xl font-medium text-red-500 ml-10">{{$matches->match_details['dire_score']}}</p>
                </div>


            </div>
            <div class="flex-1">
                <div class="flex justify-end">
                    <div class="flex flex-col mr-4">
                        <p class="font-medium text-right text-gray-600">MATCH ID</p>
                        <p class="font-medium text-right">{{$matches->match_id}}</p>
                    </div>
                    <div class="flex flex-col mr-4">
                        <p class="font-medium text-right text-gray-600">REGION</p>
                        <p class="font-medium text-right low">{{$itemsData->region[$matches->match_details['region']]}}</p>
                    </div>
                    <div class="flex flex-col">
                        <p class="font-medium text-right text-gray-600">SKILL</p>
                        <p class="font-medium text-right">
                            @if ($matches->match_details['skill'] == 1)
                                Normal Skill
                            @elseif($matches->match_details['skill'] == 2)
                                High Skill
                            @elseif($matches->match_details['skill'] == 3)
                                Very High Skill
                            @endif
                        </p>
                    </div>

                </div>

            </div>

        </div>

        {{-- bottom --}}
        {{-- radiant --}}
        <div class="flex max-w-6xl flex-col">
                <div class="flex justify-center border-b-2 border-gray-300 pb-4 mt-4">
                        <a href="{{ url('/matches/' . $matches->match_id ) }}" class="text-md font-medium text-indigo-500 mr-20 hover:text-indigo-600
                         ">Overview</a>
                        <a href="{{ url('/matches/' . $matches->match_id ) }}/skills" class="text-md font-medium text-indigo-500 mx-10 hover:text-indigo-600
                        ">Skills Build</a>
                        <a href="{{ url('/matches/' . $matches->match_id ) }}" class="text-md font-medium text-indigo-500 ml-20 hover:text-indigo-600
                        ">Performance</a>
                    </div>

                    <div class="flex max-w-6xl flex-col mt-8">
                    <p class="text-xl tracking-wide font-medium">Radiant - Performances {{ ($matches->match_details['radiant_win'] == true) ? 'Winner' : '' }}</p>
                            <table class="border-collapse w-full table-auto">
                                    <thead class="text-gray-600">
                                            <th class="capitalize border-b border-gray-300 py-4 text-left w-2">PLAYER</th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Longest multi-kill'">MULTI</span></th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Longest killstreak'">STREAK</span></th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Seconds of disable on heroes'">STUNS</span></th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Camps stacked'">STACKED</span></th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Number of buybacks'">BUYBACKS</span></th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Lane based on early game position'">LANE</span></th>
                                    </thead>
                                    <tbody class="text-center">
                                    @foreach ($matches->match_details['players'] as $player)
                                    @if($player['isRadiant'] == 1)
                                        @include('users.matches.match_performance_table')
                                    @endif
                                    @endforeach
                                    </tbody>
                            </table>
                    </div>
                    {{-- ability build dire --}}
                    <div class="flex max-w-6xl flex-col mt-8">
                            <p class="text-xl tracking-wide font-medium">Dire - Performances {{ ($matches->match_details['radiant_win'] == false) ? 'Winner' : '' }}</p>
                            <table class="border-collapse w-full table-auto">
                                    <thead class="text-gray-600">
                                            <th class="capitalize border-b border-gray-300 py-4 text-left w-2">PLAYER</th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Longest multi-kill'">MULTI</span></th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Longest killstreak'">STREAK</span></th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Seconds of disable on heroes'">STUNS</span></th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Camps stacked'">STACKED</span></th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Number of buybacks'">BUYBACKS</span></th>
                                            <th class="capitalize border-b border-gray-300 py-4 "><span v-tooltip.top="'Lane based on early game position'">LANE</span></th>
                                    </thead>
                                    <tbody class="text-center">
                                    @foreach ($matches->match_details['players'] as $player)
                                    @if($player['isRadiant'] == 0)
                                    <tr>
                                            @include('users.matches.match_performance_table')
                                    </tr>
                                    @endif
                                    @endforeach
                                    </tbody>
                            </table>
                    </div>
        </div>
            @else
            <p class="font-semibold text-lg mt-5">Wrong match id</p>
            @endif
@endsection
