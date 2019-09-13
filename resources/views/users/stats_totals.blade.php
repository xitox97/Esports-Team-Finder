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
                      <a class="nav-link " href="{{ url('/players/' . Auth::user()->accounts->dota_id ) }}/heroes">Heroes</a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/players/' . Auth::user()->accounts->dota_id ) }}/totals">Totals</a>
                          </li>
                  </ul>

    </div>
    <div class="row mt-4">

           <div class="col-md-12">
                @if ($statistics != null)
                <div class="card" >
                    <div class="card-header">
                                In All Matches
                              </div>
                @foreach ($statistics->tot_score as $recent)

                    @if ($recent['field'] == 'kills')
                        <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                            <div class="card-header">
                                    {{$recent['field']}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$recent['sum']}}</li>

                            </ul>
                        </div>
                    @elseif($recent['field'] == 'deaths')
                    <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                            <div class="card-header">
                                    {{$recent['field']}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$recent['sum']}}</li>

                            </ul>
                        </div>
                    @elseif($recent['field'] == 'assists')
                    <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                            <div class="card-header">
                                    {{$recent['field']}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$recent['sum']}}</li>

                            </ul>
                        </div>
                    @elseif($recent['field'] == 'last_hits')
                    <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                            <div class="card-header">
                                    {{$recent['field']}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$recent['sum']}}</li>

                            </ul>
                    </div>
                    @elseif($recent['field'] == 'denies')
                    <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                            <div class="card-header">
                                    {{$recent['field']}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$recent['sum']}}</li>

                            </ul>
                    </div>
                    @elseif($recent['field'] == 'duration')
                    <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                            <div class="card-header">
                                @php
                                    $days = (int)($recent['sum']/86400);
                                    $rdays = ($recent['sum']-($days*86400));
                                    $hours = (int)($rdays/3600);
                                    $rhours = ($rdays-($hours*3600));
                                    $minutes = (int)($rhours/60);
                                @endphp
                                    {{$recent['field']}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$days}}D : {{$hours}}H : {{$minutes}}M</li>

                            </ul>
                    </div>
                    @elseif($recent['field'] == 'level')
                    <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                            <div class="card-header">
                                    {{$recent['field']}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$recent['sum']}}</li>

                            </ul>
                    </div>
                    @elseif($recent['field'] == 'hero_damage')
                    <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                            <div class="card-header">
                                    {{$recent['field']}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$recent['sum']}}</li>

                            </ul>
                    </div>
                    @elseif($recent['field'] == 'tower_damage')
                    <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                            <div class="card-header">
                                    {{$recent['field']}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$recent['sum']}}</li>

                            </ul>
                    </div>
                    @elseif($recent['field'] == 'hero_healing')
                    <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                            <div class="card-header">
                                    {{$recent['field']}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$recent['sum']}}</li>

                            </ul>
                    </div>
                    @elseif($recent['field'] == 'hero_healing')
                    <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                            <div class="card-header">
                                    {{$recent['field']}}
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$recent['sum']}}</li>

                            </ul>
                    </div>
                    @endif

                @endforeach
            </div>
                @else
               Fetching data... Comeback back again in minutes
            @endif

            @if ($statistics != null)
            <div class="card mt-3" >
                    <div class="card-header">
                            In Parsed Matches
                              </div>
            @foreach ($statistics->tot_score as $recent)
                @if ($recent['field'] == 'stuns')
                <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                    <div class="card-header">
                            {{$recent['field']}}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ round($recent['sum'], 0)}}</li>

                    </ul>
                </div>
                @elseif($recent['field'] == 'tower_kills')
                <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                        <div class="card-header">
                                {{$recent['field']}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$recent['sum']}}</li>

                        </ul>
                </div>
                @elseif($recent['field'] == 'neutral_kills')
                <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                        <div class="card-header">
                                {{$recent['field']}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$recent['sum']}}</li>

                        </ul>
                </div>
                @elseif($recent['field'] == 'courier_kills')
                <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                        <div class="card-header">
                                {{$recent['field']}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$recent['sum']}}</li>

                        </ul>
                </div>
                @elseif($recent['field'] == 'purchase_tpscroll')
                <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                        <div class="card-header">
                                {{$recent['field']}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$recent['sum']}}</li>

                        </ul>
                </div>
                @elseif($recent['field'] == 'purchase_ward_observer')
                <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                        <div class="card-header">
                                {{$recent['field']}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$recent['sum']}}</li>

                        </ul>
                </div>
                @elseif($recent['field'] == 'purchase_ward_sentry')
                <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                        <div class="card-header">
                                {{$recent['field']}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$recent['sum']}}</li>

                        </ul>
                </div>
                @elseif($recent['field'] == 'purchase_gem')
                <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                        <div class="card-header">
                                {{$recent['field']}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$recent['sum']}}</li>

                        </ul>
                </div>
                @elseif($recent['field'] == 'purchase_rapier')
                <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                        <div class="card-header">
                                {{$recent['field']}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$recent['sum']}}</li>

                        </ul>
                </div>
                @elseif($recent['field'] == 'pings')
                <div class="card mt-4 ml-2 mb-3 mr-2" style="width: 18rem;">
                        <div class="card-header">
                                {{$recent['field']}}
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$recent['sum']}}</li>

                        </ul>
                </div>

                @endif
            @endforeach
            @endif
    </div>
</div>
@endsection
