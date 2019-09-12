@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-3">
                @if ( Auth::user()->id != $fetchPlayers->user_id )
                            <h1><u>Interactions</u></h1>
            <a href="/offer/{{ $fetchPlayers->user_id }}" class="btn btn-success"
                            role="button" aria-pressed="true">Offer</a>
                            <a href="#" class="btn btn-primary"
                            role="button" aria-pressed="true">Live Chat</a>

                            <a href="{{  $fetchPlayers->profile_url  }}" class="btn btn-danger"
                            role="button" aria-pressed="true">Add Friend In Steam</a>

                            @if (session('offer'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ session('offer') }}</li>
                                </ul>
                            </div>
                        @endif
                        @endif
           </div>
        <div class="col-md-9">
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
                    <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><b>Steam Profile URL:</b>  <a href="{{  $fetchPlayers->profile_url  }}">{{  $fetchPlayers->profile_url  }}</a></li>
                      <li class="list-group-item"><b>MMR ESTIMATE:</b>  {{  $fetchPlayers->mmr  }}</li>
                      <li class="list-group-item"><b>Win:</b> {{  $fetchPlayers->win_lose['win']  }}<br><b> Lose:</b>  {{  $fetchPlayers->win_lose['lose']  }} </li>
                      <li class="list-group-item"><b>Game:</b> Dota</li>
                      <li class="list-group-item"><b>Age:</b> {{ $fetchPlayers->user->age }}</li>
                      <li class="list-group-item"><b>Area:</b> {{ $fetchPlayers->user->area }}</li>
                      <li class="list-group-item"><b>State:</b> {{ $fetchPlayers->user->state }}</li>
                      <li class="list-group-item"><b>Country:</b> {{ $fetchPlayers->country }}</li>
                    </ul>
                    @if ( Auth::user()->id == $fetchPlayers->user_id )
                    <a href="{{url('users/' . $fetchPlayers->user_id  . '/edit')}}" class="btn btn-success"
                        role="button" aria-pressed="true">Edit</a>
                    @endif
                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
