@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card" >

                    <img src={{  $playerInfos['profile']['avatarfull']  }}" class="rounded mx-auto d-block" alt="...">
                        {{-- {{dd($playerInfos['profile'])}} --}}



                    <div class="card-body">
                      <h5 class="card-title text-center"><b>Steam Name:</b> {{  $playerInfos['profile']['personaname']  }}</h5>
                      <p class="card-text"></p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><b>Steam Profile URL:</b>  <a href="{{  $playerInfos['profile']['profileurl']  }}">{{  $playerInfos['profile']['profileurl']  }}</a></li>
                      <li class="list-group-item"><b>MMR ESTIMATE:</b>  {{  $playerInfos['solo_competitive_rank']  }}</li>
                      <li class="list-group-item">Dapibus ac facilisis in</li>
                      <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                    <div class="card-body">
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div>
                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
   {{-- {{ dd($dotas->accounts->toArray())}} --}}

                    {{-- {{ dd($dotas->name)}} --}}
