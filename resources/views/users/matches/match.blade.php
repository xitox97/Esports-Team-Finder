@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / <a href=""
        class="no-underline hover:underline text-blue-500">Overview</a> / Farhan</span>
    </section>

    <div class="container ml-24 mt-12">
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
            <p class="text-xl tracking-wide font-medium">Radiant - Overview</p>
            <table class="border-collapse w-full table-fixed">
                <thead class="text-gray-600">
                        <th class="capitalize border-b border-gray-300 py-4 text-left w-2">PLAYER</th>
                        <th class="capitalize border-b border-gray-300 py-4 w-1 text-right">LVL</th>
                        <th class="capitalize border-b border-gray-300 py-4 w-1 text-right">K</th>
                        <th class="capitalize border-b border-gray-300 py-4 w-1">D</th>
                        <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">A</th>
                        <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">LH/DN</th>
                        <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">HD</th>
                        <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">TD</th>
                        <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">HH</th>
                        <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">GOLD</th>
                        <th class="capitalize border-b border-gray-300 py-4 w-4">ITEMS</th>
                </thead>
                <tbody class="text-center">
                @foreach ($matches->match_details['players'] as $player)

                @if($player['isRadiant'] == 1)
                    <tr class="hover:bg-gray-200">
                        @if(array_key_exists("personaname", $player))
                        <td class="py-2 border-b border-gray-300 w-2/12">
                            <div class="flex items-center">
                            @include('users.heroes2')
                            <div class="flex flex-col items-start ml-2 truncate">
                                <div class="w-11/12 truncate text-left">{{$player['personaname']}}</div>
                                @include('users.medal_word')
                            </div>
                            </div>
                        </td>
                        @else
                        <td class="border-b border-gray-300">
                                <div class="flex items-center">
                                @include('users.heroes2')
                                <div class="flex flex-col items-start ml-2">
                                    <div>Anonymous</div>
                                    @include('users.medal_word')
                                </div>
                                </div>
                            </td>
                        @endif
                        <td class="border-b border-gray-300 text-right">{{$player['level']}}</td>
                        <td class="border-b border-gray-300 text-right">{{$player['kills']}}</td>
                        <td class="border-b border-gray-300">{{$player['deaths']}}</td>
                        <td class="border-b border-gray-300 text-left">{{$player['assists']}}</td>
                        <td class="border-b border-gray-300 text-left">{{$player['last_hits']}}/{{$player['denies']}}</td>
                        <td class="border-b border-gray-300 text-left">
                            @if($player['hero_damage'] >= 1000)
                            {{round(((float)$player['hero_damage']/1000),1)}}k
                            @else
                            {{$player['hero_damage']}}
                            @endif
                        </td>
                        <td class="border-b border-gray-300 text-left">
                                @if($player['tower_damage'] >= 1000)
                                {{round(((float)$player['tower_damage']/1000),1)}}k
                                @else
                                {{$player['tower_damage']}}
                                @endif
                        </td>
                        <td class="border-b border-gray-300 text-left">
                            @if($player['hero_healing'] >= 1000)
                            {{round(((float)$player['hero_healing']/1000),1)}}k
                            @else
                            {{$player['hero_healing']}}
                            @endif
                        </td>
                        <td class="border-b border-gray-300 text-yellow-500 text-left">
                            @if($player['total_gold'] >= 1000)
                            {{round(((float)$player['total_gold']/1000),1)}}k
                            @else
                            {{$player['total_gold']}}
                            @endif
                        </td>
                        <td class="border-b border-gray-300 flex">@include('users.matches.items')</td>
                    </tr>
                @endif
                @endforeach
                </tbody>
            </table>
        </div>
        {{-- hero banned --}}
        {{-- <div class="flex max-w-6xl mt-4 justify-center">
            @foreach($matches->match_details['picks_bans'] as $ban)
            @if ( $player['hero_id'] == null)
            <img src="
            {{  asset('img/heroes/default.png') }}" class="w-16">
            @else
            <div class="flex flex-col items-center">
            <div class="border-2 border-red-600 mx-2">
                    <img  src="
                    {{  asset('img/heroes/' . $ban['hero_id'] . '.png') }}" class="w-16" style="filter: grayscale(100%);">
                </div>
                <div class="bg-black  px-3 ">
                    <p class="text-white font-base tracking-wide">Ban {{$loop->index + 1}}</p>

                </div>
            </div>

            @endif
            @endforeach
        </div> --}}
        {{-- dire --}}
        <div class="flex max-w-6xl flex-col  mt-8">
                <p class="text-xl tracking-wide font-medium">Dire - Overview</p>
                <table class="border-collapse w-full table-fixed">
                    <thead class="text-gray-600">
                            <th class="capitalize border-b border-gray-300 py-4 text-left w-2">PLAYER</th>
                            <th class="capitalize border-b border-gray-300 py-4 w-1 text-right">LVL</th>
                            <th class="capitalize border-b border-gray-300 py-4 w-1 text-right">K</th>
                            <th class="capitalize border-b border-gray-300 py-4 w-1">D</th>
                            <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">A</th>
                            <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">LH/DN</th>
                            <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">HD</th>
                            <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">TD</th>
                            <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">HH</th>
                            <th class="capitalize border-b border-gray-300 py-4 w-1 text-left">GOLD</th>
                            <th class="capitalize border-b border-gray-300 py-4 w-4">ITEMS</th>
                    </thead>
                    <tbody class="text-center">
                    @foreach ($matches->match_details['players'] as $player)

                    @if($player['isRadiant'] == 0)
                        <tr class="hover:bg-gray-200">
                                @if(array_key_exists("personaname", $player))
                                <td class="py-2 border-b border-gray-300 w-2/12">
                                    <div class="flex items-center">
                                    @include('users.heroes2')
                                    <div class="flex flex-col items-start ml-2 truncate">
                                        <div class="truncate w-11/12 text-left">{{$player['personaname']}}</div>
                                        @include('users.medal_word')
                                    </div>
                                    </div>
                                </td>
                                @else
                                <td class="py-2 border-b border-gray-300">
                                        <div class="flex  items-center">
                                        @include('users.heroes2')
                                        <div class="flex flex-col items-start ml-2">
                                            <div>Anonymous</div>
                                            @include('users.medal_word')
                                        </div>
                                        </div>
                                    </td>
                                @endif
                                <td class="border-b border-gray-300 text-right">{{$player['level']}}</td>
                                <td class="border-b border-gray-300 text-right">{{$player['kills']}}</td>
                                <td class="border-b border-gray-300">{{$player['deaths']}}</td>
                                <td class="border-b border-gray-300 text-left">{{$player['assists']}}</td>
                                <td class="border-b border-gray-300 text-left">{{$player['last_hits']}}/{{$player['denies']}}</td>
                                <td class="border-b border-gray-300 text-left">
                                        @if($player['hero_damage'] >= 1000)
                                        {{round(((float)$player['hero_damage']/1000),1)}}k
                                        @else
                                        {{$player['hero_damage']}}
                                        @endif
                                    </td>
                                    <td class="border-b border-gray-300 text-left">
                                            @if($player['tower_damage'] >= 1000)
                                            {{round(((float)$player['tower_damage']/1000),1)}}k
                                            @else
                                            {{$player['tower_damage']}}
                                            @endif
                                    </td>
                                    <td class="border-b border-gray-300 text-left">
                                        @if($player['hero_healing'] >= 1000)
                                        {{round(((float)$player['hero_healing']/1000),1)}}k
                                        @else
                                        {{$player['hero_healing']}}
                                        @endif
                                    </td>
                                    <td class="border-b border-gray-300 text-yellow-500 text-left">
                                        @if($player['total_gold'] >= 1000)
                                        {{round(((float)$player['total_gold']/1000),1)}}k
                                        @else
                                        {{$player['total_gold']}}
                                        @endif
                                    </td>
                                <td class="border-b border-gray-300 flex">@include('users.matches.items')</td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
            </div>




<div class="container-fuild my-5 mx-5 px-5">

@if($matches != null)

<div class="text-center"><h3><b>ALLL DRAFT</b></h3>
    <h1>Radiant <span class="text-success">{{$matches->match_details['radiant_score']}}</span> :
    <span class="text-danger">{{$matches->match_details['dire_score']}}</span> Dire</h1>
    @if($matches->match_details['radiant_win'] == true)
    <h2><span class="text-success">Radiant Victory
            @php
            $minutes=$matches->match_details['duration'];
            $hours = intdiv($minutes, 60).':'. ($minutes % 60);
            echo "(" . $hours . ")";
        @endphp
        </span></h2>
    @else
    <h2><span class="text-danger">Dire Victory
            @php
            $minutes=$matches->match_details['duration'];
            $hours = intdiv($minutes, 60).':'. ($minutes % 60);
            echo "(" . $hours . ")";
        @endphp
    </span></h2>
    @endif

</div>

<table class="table table-striped text-center"><h3>Radiant - Overview</h3>
  <thead>
    <tr>
      <th scope="col">PLAYER</th>
      <th scope="col">LVL</th>
      <th scope="col">KDA</th>
      <th scope="col">LH/DN</th>
      <th scope="col">GPM/XPM</th>
      <th scope="col">HERO DAMAGES</th>
      <th scope="col">TOWER DAMAGES</th>
      <th scope="col">HERO HEALED</th>
      <th scope="col">GOLD</th>
      <th scope="col">ITEMS</th>
      <th scope="col">CAMPS STACKED</th>
      <th scope="col">OBSERVER/SENTRY PLACED</th>
      <th scope="col">LANE</th>


    </tr>
  </thead>
  <tbody>

@foreach ($matches->match_details['players'] as $player)

    @if($player['isRadiant'] == 1)

        @if(array_key_exists("personaname", $player))
                <tr>
                <td>{{$player['personaname']}}<br>@include('users.heroes2')@include('users.medal3') </td>
                <td>{{$player['level']}}</td>
                <td>{{$player['kills']}} / {{$player['deaths']}} / {{$player['assists']}}</td>
                <td>{{$player['last_hits']}} / {{$player['denies']}}</td>
                <td>{{$player['gold_per_min']}} / {{$player['xp_per_min']}}</th>
                <td>{{$player['hero_damage']}}</td>
                <td>{{$player['tower_damage']}}</td>
                <td>{{$player['hero_healing']}}</td>
                <td>{{$player['total_gold']}}</td>
                <td>@include('users.matches.items')</td>
                <td>{{$player['camps_stacked']}}</td>
                <td>@include('users.matches.wards')</td>
                <td>@include('users.matches.roles')</td>
                </tr>
        @else
        <tr>
                <td>Unknown<br>@include('users.heroes2'){{$player['rank_tier']}}</td>
                <td>{{$player['level']}}</td>
                <td>{{$player['kills']}} / {{$player['deaths']}} / {{$player['assists']}}</td>
                <td>{{$player['last_hits']}} / {{$player['denies']}}</td>
                <td>{{$player['gold_per_min']}} / {{$player['xp_per_min']}}</th>
                <td>{{$player['hero_damage']}}</td>
                <td>{{$player['tower_damage']}}</td>
                <td>{{$player['hero_healing']}}</td>
                <td>{{$player['total_gold']}}</td>
                <td>@include('users.matches.items')</td>
                <td>{{$player['camps_stacked']}}</td>
                <td>@include('users.matches.wards')</td>
                <td>@include('users.matches.roles')</td>
                </tr>
            @endif
    @endif

            @endforeach
  </tbody>
</table>

<table class="table table-striped text-center mt-3"><h3>Dire - Overview</h3>
    <thead>
      <tr>
        <th scope="col">PLAYER</th>
        <th scope="col">LVL</th>
        <th scope="col">KDA</th>
        <th scope="col">LH/DN</th>
        <th scope="col">GPM/XPM</th>
        <th scope="col">HERO DAMAGES</th>
        <th scope="col">TOWER DAMAGES</th>
        <th scope="col">HERO HEALED</th>
        <th scope="col">GOLD</th>
        <th scope="col">ITEMS</th>
        <th scope="col">CAMPS STACKED</th>
        <th scope="col">OBSERVER/SENTRY PLACED</th>
        <th scope="col">LANE</th>
      </tr>
    </thead>
    <tbody>

  @foreach ($matches->match_details['players'] as $player)

      @if($player['isRadiant'] == 0)

          @if(array_key_exists("personaname", $player))


                  <tr>
                  <td>{{$player['personaname']}} <br>@include('users.heroes2')  @include('users.medal3') </td>
                  <td>{{$player['level']}}</td>
                  <td>{{$player['kills']}} / {{$player['deaths']}} / {{$player['assists']}}</td>
                  <td>{{$player['last_hits']}} / {{$player['denies']}}</td>
                  <td>{{$player['gold_per_min']}} / {{$player['xp_per_min']}}</th>
                  <td>{{$player['hero_damage']}}</td>
                  <td>{{$player['tower_damage']}}</td>
                  <td>{{$player['hero_healing']}}</td>
                  <td>{{$player['total_gold']}}</td>
                  <td>@include('users.matches.items')</td>
                  <td>{{$player['camps_stacked']}}</td>
                  <td>@include('users.matches.wards')</td>
                  <td>@include('users.matches.roles')</td>

                  </tr>
          @else
          <tr>
                  <td>Unknown<br>@include('users.heroes2')@include('users.medal3')</td>
                  <td>{{$player['level']}}</td>
                  <td>{{$player['kills']}} / {{$player['deaths']}} / {{$player['assists']}}</td>
                  <td>{{$player['last_hits']}} / {{$player['denies']}}</td>
                  <td>{{$player['gold_per_min']}} / {{$player['xp_per_min']}}</th>
                  <td>{{$player['hero_damage']}}</td>
                  <td>{{$player['tower_damage']}}</td>
                  <td>{{$player['hero_healing']}}</td>
                  <td>{{$player['total_gold']}}</td>
                  <td>@include('users.matches.items')</td>
                  <td>{{$player['camps_stacked']}}</td>
                  <td>@include('users.matches.wards')</td>
                  <td>@include('users.matches.roles')</td>
                  </tr>
              @endif
      @endif

              @endforeach
    </tbody>
  </table>
  @else
  <p class="font-semibold text-lg  mt-5 ">Processing Match details... Comeback back again in minutes</p>
  @endif
</div>
    </div>
@endsection
