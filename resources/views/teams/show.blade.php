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

                                <li>
                                    @if ($player->id == $team->captain_id)
                                        <b>Captain:</b>
                                    @endif

                                    <a href="/players/{{ $player->accounts['dota_id']  }}">{{ $player->name }}</a> </li>
                        @endforeach

                    </ul>
                </div>

                          </div>

                    </div>


                    @foreach ($team->users as $player)


                        @if ($player->id === Auth::user()->id)
                            <div class="card">
                                <div class="card-header">Action</div>

                                <div class="card" >
                                        <div class="card-body">

                                        <a href="/leave/{{ $team->id }}" class="btn btn-warning "
                                                role="button" >Leave Team</a>


                                                {{-- Action for captain only --}}
                                                @if ($team->captain_id === Auth::user()->id)

                                                        @if($team->scrim == false)
                                                            <a href="/teams/scrim/{{ $team->id }}" class="btn btn-primary "
                                                            role="button" >Ready for scrim</a>
                                                        @else
                                                            <a href="/teams/notScrim/{{ $team->id }}" class="btn btn-info"
                                                            role="button" >Not Ready for scrim</a>
                                                        @endif

                                                <form action="/teams/{{ $team->id }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger ">Delete Team</button>
                                                    </form>
                                                @endif


                                        </div>
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





                    <div class="card">
                        <div class="card-header">Team notification</div>

                        <div class="card" >
                                <div class="card-body">
                                <a href="/tnotification" class="btn btn-primary btn-lg"
                                        role="button" aria-disabled="true">Notification</a>


                </div>


                            {{-- <div class="card-body">
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                            </div> --}}
                        </div>

                    </div>


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
                      @if($team->scrim == true)
                        <li class="list-group-item"><b>Ready to scrim:</b><br><b>Ready</b></li>
                      @else
                        <li class="list-group-item"><b>Ready to scrim:</b><br><b>Not Ready</b></li>
                      @endif
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
