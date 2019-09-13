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
                      <a class="nav-link" href="{{ url('/players/' . Auth::user()->accounts->dota_id ) }}/stats">Overview</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link " href="{{ url('/players/' . Auth::user()->accounts->dota_id ) }}/peers">Peers</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ url('/players/' . Auth::user()->accounts->dota_id ) }}/heroes">Heroes</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="{{ url('/players/' . Auth::user()->accounts->dota_id ) }}/totals">Totals</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link " href="{{ url('/players/' . Auth::user()->accounts->dota_id ) }}/counts">Counts</a>
                          </li>
                  </ul>

    </div>
    <div class="row mt-4">

           <div class="col-md-12">

                <div class="card" >
                        <div class="card-header">
                                Heroes Played
                              </div>
                <table class="table table-striped text-center">
                        <thead>
                          <tr>
                            <th scope="col">Hero</th>
                            <th scope="col">Matches Played</th>
                            <th scope="col">Win Rate %</th>
                            <th scope="col">With Win %</th>
                            <th scope="col">Win Against %</th>
                          </tr>
                        </thead>
                        <tbody>
                @if ($statistics != null)
                @foreach ($statistics->heroes_played as $recent)
                          <tr>
                            <td> @include('users.heroes')</td>
                            <td> {{$recent['games']}} ({{$recent['win']}} won)</td>
                            <td> @php
                                echo (round(($recent['win'] / $recent['games']) * 100, 1));
                            @endphp
                                </td>
                            <td>  @php
                                    echo (round(($recent['with_win'] / $recent['with_games']) * 100, 1));
                                @endphp ({{$recent['with_win']}}/{{$recent['with_games']}})
                                </td>
                            <td> @php
                                    echo (round(($recent['against_win'] / $recent['against_games']) * 100, 1));
                                @endphp ({{$recent['against_win']}}/{{$recent['against_games']}})</td>
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
