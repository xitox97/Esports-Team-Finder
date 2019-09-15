@extends('layouts.app')

@section('content')
<div class="container">


        <div class="d-flex  flex-row">

                        <div class="p-2" >
                            <img src="{{  $fetchPlayers->avatar_url  }}" class="rounded-circle" alt="...">   </div>
                              <div class="p-2">

                                <h5 class="p-2 mt-3 text-center"><b>{{  $fetchPlayers->steam_name  }}</b> </h5>

                                <div class="d-flex ml-3 mt-2 ">
                                    <h1 class="text-success" >WINS <br>{{  $fetchPlayers->win_lose['win']  }}</h1>
                                    <h1 class="text-danger" >LOSSES <br>{{  $fetchPlayers->win_lose['lose']  }}</h1>
                                    </div>
                                </div>

                                <div class="flex-grow-1"></div>

                                <div class="p-2 mt-4">
                              @include('users.medal')</div>
                            </div>

            <div class="flex-row">
                    <ul class="nav nav-tabs d-flex justify-content-center">
                            <li class="nav-item">
                              <a class="nav-link active" href="{{ url('/players/' . $fetchPlayers->dota_id ) }}/stats">Overview</a>
                            </li>

                            <li class="nav-item">
                              <a class="nav-link " href="{{ url('/players/' . $fetchPlayers->dota_id ) }}/heroes">Heroes</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{ url('/players/' . $fetchPlayers->dota_id ) }}/totals">Totals</a>
                            </li>

                          </ul>

    </div>
    <div class="row mt-4">

           <div class="col-md-12">
                <div class="card" >
                        <div class="card-header">
                                Recent Matches
                              </div>
                <table class="table table-striped text-center">
                        <thead>
                          <tr>
                            <th scope="col">Hero</th>
                            <th scope="col">Result</th>
                            <th scope="col">Game Mode</th>
                            <th scope="col">Score (K/D/A)</th>
                            <th scope="col">Duration</th>
                          </tr>
                        </thead>
                        <tbody>
                @if ($statistics != null)
                @foreach ($statistics->recent_match as $recent)
                          <tr>
                            <td> @include('users.heroes')</td>
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

                            <a href="{{ url('matches/' . $recent['match_id']) }}"><p class="{{ $result == 'Won Match' ? 'text-success' : 'text-danger' }}"> {{ $result}} </p></a>


                            </td>
                            <td> @include('users.gameMode')</td>
                            <td>{{ $recent['kills'] }}/{{ $recent['deaths'] }}/{{ $recent['assists'] }}</td>
                            <td>@php
                                    $minutes=$recent['duration'];
                                    $hours = intdiv($minutes, 60).':'. ($minutes % 60);
                                    echo $hours;
                                @endphp
                                <br>
                               {{ $position }}
                            </td>
                            </tr>
            @endforeach
            @else
                            <tr class="mb-3 mt-3" ><td colspan="5"  > Fetching data... Comeback back again in minutes</td>

                            </tr>




            @endif
        </tbody>
    </table>
</div>
           </div>

    </div>
</div>
@endsection
