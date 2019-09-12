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
                <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Match id</th>
                            <th scope="col">Hero</th>
                            <th scope="col">Score (K/D/A)</th>
                            <th scope="col">Duration</th>
                          </tr>
                        </thead>
                        <tbody>
                @foreach ($statistics->recent_match as $recent)
                {{-- <li class="list-group-item"><b>Match ID:</b> {{ $recent['match_id'] }}</li> --}}


                          <tr>
                            <th scope="row">{{ $recent['match_id'] }}</th>
                            <td>{{ $recent['hero_id'] }}</td>
                            <td>{{ $recent['kills'] }}/{{ $recent['deaths'] }}/{{ $recent['assists'] }}</td>
                            <td>{{ $recent['duration'] }}</td>
                          </tr>


            @endforeach
        </tbody>
    </table>
           </div>

    </div>
</div>
@endsection
