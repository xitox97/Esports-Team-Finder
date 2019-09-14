@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
    @foreach ($players as $player)


<div class="col-5">
    <div class="card text-center" >
            <div class="card-body">
                    <img src="{{  $player->accounts->avatar_url  }}" class="rounded-circle mb-3" alt="...">
                    <h5 class="card-title text-center"> {{   $player->accounts->steam_name  }}</h5>
                    @include('users.medal2')
                <p class="card-text"></p>
            </div>
            <a href="{{ url('/players/' . $player->accounts->dota_id) }}" class="btn btn-primary" role="button" >View</a>
          </div>
        </div>
    @endforeach
</div>
</div>
@endsection
