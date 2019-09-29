@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
        <span class="italic text-sm">Home / Overview / <a href="{{url('/players/' . $fetchPlayers->dota_id)}}"
            class="no-underline hover:underline text-blue-500">{{$fetchPlayers->user->name}}</a> / Heroes</span>
        </section>

        <!--topsection-->
            <div class="container mx-auto w-full mt-4 bg-white shadow-lg rounded-lg pt-3 pl-3">
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
                      <a class="nav-link" href="{{ url('/players/' . $fetchPlayers->dota_id ) }}/stats">Overview</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" href="{{ url('/players/' . $fetchPlayers->dota_id ) }}/heroes">Heroes</a>
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
                @if ($pageHeroes != null)
                @foreach ($pageHeroes as $recent)
                          <tr>
                            <td> @include('users.heroes')</td>
                            <td> {{$recent['games']}} ({{$recent['win']}} won)</td>
                            <td> @php
                                    if($recent['games'] != 0){
                                        echo (round(($recent['win'] / $recent['games']) * 100, 1));
                                    }
                                    else {
                                        echo "0";
                                    }
                                @endphp
                                </td>
                            <td>  @php
                                    if($recent['with_games'] != 0){
                                        echo (round(($recent['with_win'] / $recent['with_games']) * 100, 1));
                                        echo "(" . $recent['with_win'] . "/" . $recent['with_games'] . ")";
                                    }
                                    else {
                                        echo "0";
                                    }
                                @endphp
                                </td>
                            <td> @php
                                    if($recent['against_games'] != 0){
                                        echo (round(($recent['against_win'] / $recent['against_games']) * 100, 1));
                                        echo "(" . $recent['against_win'] . "/" . $recent['against_games'] . ")";
                                    }
                                    else {
                                        echo "0";
                                    }
                                @endphp</td>
                            </tr>
            @endforeach
            @else
                            <tr class="mb-3 mt-3" ><td colspan="5"  > Fetching data... Comeback back again in minutes</td>

                            </tr>




            @endif
        </tbody>
    </table>
    {{ $pageHeroes->links() }}
</div>
           </div>

    </div>
</div>
@endsection
