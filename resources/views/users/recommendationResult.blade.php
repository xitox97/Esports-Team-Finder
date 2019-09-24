@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
    @forelse($result as $player)


<div class="col-5">
    <div class="card text-center" >
            <div class="card-body">
                    <img src="{{  $player->accounts['avatar_url']  }}" class="rounded-circle mb-3" alt="...">
                    <h5 class="card-title text-center"> {{   $player->accounts['steam_name']  }}</h5>
                    @include('users.medal2')
            </div>
            <a href="{{ url('/players/' . $player->accounts['dota_id']) }}" class="btn btn-primary" role="button" >View</a>
          </div>
        </div>
        @empty
        <div class="col-10 text-center mt-4">
            <div class="alert alert-warning">
                <h1>There is no players that satisfy your input!</h1>
            </div>
        </div>
    @endforelse
</div>
</div>
@endsection
