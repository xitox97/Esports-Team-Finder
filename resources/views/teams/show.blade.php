@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> <div class="row">
            <div class="col-md-4">

                    <div class="card">
                        <div class="card-header">Team Members</div>

                        <div class="card" >
                                <div class="card-body">


                                <ul>

                        @foreach ($team->users as $player)

                                <li> <a href="/players/{{ $player->accounts['dota_id']  }}">{{ $player->name }}</a> </li>




                        @endforeach
                    </ul>
                </div>


                            {{-- <div class="card-body">
                              <a href="#" class="card-link">Card link</a>
                              <a href="#" class="card-link">Another link</a>
                            </div> --}}
                          </div>

                    </div>


                    @foreach ($team->users as $player)

                        @if ($player->id === Auth::user()->id)



                        <div class="card">
                                <div class="card-header">Action</div>

                                <div class="card" >
                                        <div class="card-body">
                                        <a href="/leave/{{ $team->id }}" class="btn btn-danger btn-lg"
                                                role="button" aria-disabled="true">Leave Team</a>
                        </div>


                                    {{-- <div class="card-body">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                    </div> --}}
                                </div>

                            </div>
                        @endif
                    @endforeach

                        @if (session('leave'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('leave') }}</li>
                            </ul>
                        </div>
                    @endif

                </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile</div>

                <div class="card" >

                    <img src="{{  asset('storage/pics/' . $team->image) }}" class="rounded mx-auto d-block mw-100" alt="...">
                        {{-- {{dd($fetchPlayers['profile'])}} --}}


                    <div class="card-body">
                      <h5 class="card-title text-center"><b>Team Name: {{ $team->name }}</b></h5>
                      <p class="card-text"></p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><b>Area:</b> {{ $team->area }} </li>
                      <li class="list-group-item"><b>MMR ESTIMATE:</b> </li>
                      <li class="list-group-item"><b>Win:</b><br><b> Lose:</b>  </li>
                      <li class="list-group-item"><b>Game:</b> Dota</li>
                    </ul>
                    {{-- <div class="card-body">
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div> --}}
                  </div>

            </div>
        </div></div>

</div>
@endsection
   {{-- {{ dd($dotas->accounts->toArray())}} --}}

                    {{-- {{ dd($dotas->name)}} --}}
