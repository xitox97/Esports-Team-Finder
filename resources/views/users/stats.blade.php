@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Profile</div>

                    <div class="card" >

                        <img src="{{  $fetchPlayers->avatar_url  }}" class="rounded mx-auto d-block" alt="...">
                          <div class="card-body">
                        <h5 class="card-title text-center"><b>Real Name:</b> {{  $fetchPlayers->user->name }}</h5>
                          <h5 class="card-title text-center"><b>Steam Name:</b> {{  $fetchPlayers->steam_name  }}</h5>
                            @include('users.medal')

                          <p class="card-text"></p>
                        </div>


                      </div>


                </div>
           </div>
           <div class="col-md-9">
                <div class="card" >
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

                            <a href="{{ $recent['match_id'] }}"><p class="{{ $result == 'Won Match' ? 'text-success' : 'text-danger' }}"> {{ $result}} </p></a>


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
        </tbody>
    </table>
</div>
           </div>

    </div>
</div>
@endsection
