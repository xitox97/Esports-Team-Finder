@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-3">

                            <h1><u>Interactions</u></h1>



            <a href="/offer/{{ $fetchPlayers->user_id }}" class="btn btn-success"
                            role="button" aria-pressed="true">Offer</a>
                            <a href="#" class="btn btn-primary"
                            role="button" aria-pressed="true">Live Chat</a>
                            <a href="#" class="btn btn-danger"
                            role="button" aria-pressed="true">Add Friend</a>


           </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card" >

                    <img src="{{  $fetchPlayers->avatar_url  }}" class="rounded mx-auto d-block" alt="...">
                        {{-- {{dd($fetchPlayers['profile'])}} --}}



                    <div class="card-body">
                      <h5 class="card-title text-center"><b>Steam Name:</b> {{  $fetchPlayers->steam_name  }}</h5>
                      <p class="card-text"></p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><b>Steam Profile URL:</b>  <a href="{{  $fetchPlayers->profile_url  }}">{{  $fetchPlayers->profile_url  }}</a></li>
                      <li class="list-group-item"><b>MMR ESTIMATE:</b>  {{  $fetchPlayers->mmr  }}</li>
                      <li class="list-group-item"><b>Win:</b> {{  $fetchPlayers->win_lose['win']  }}<br><b> Lose:</b>  {{  $fetchPlayers->win_lose['lose']  }} </li>
                      <li class="list-group-item"><b>Game:</b> Dota</li>
                    </ul>
                    {{-- <div class="card-body">
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div> --}}
                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
   {{-- {{ dd($dotas->accounts->toArray())}} --}}

                    {{-- {{ dd($dotas->name)}} --}}
