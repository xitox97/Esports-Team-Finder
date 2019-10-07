@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / Notifications</span>
</section>
<div class="container ml-24 mt-12">
    <div class="p-4">

        <p class=" text-center font-semibold text-indigo-800 text-3xl border-b-2 border-gray-300">Notifications Dashboard</p>

        <div class="flex flex-col items-center justify-center mt-3">
            @foreach (Auth::user()->unreadNotifications as $noti)

            @if( class_basename($noti->type) == "OfferTeam")

            <div class="flex flex-row justify-center bg-white rounded-lg my-2 py-2 shadow-lg w-8/12">
                    <div class="mr-12">
                            <i class="material-icons md-48">transfer_within_a_station</i>
                    </div>
                    <div class="border-r-2 border-gray-400 pr-10 mr-10">
                        <p class="text-xl font-bold">
                                You received new offer!
                        </p>
                        <span class="text-md font-base">
                            <span class="font-bold text-purple-600">Team {{ $noti->data['team_name'] }}</span> has sent you offer to join their team!
                        </span>
                    </div>
                    <div class="flex">
                        <div class="flex flex-col mr-2 cursor-pointer">
                            <a
                            href="/accept/{{ $noti->data['offer_id'] }}/notifications/{{$noti->id}}"
                            role="button" aria-pressed="true">
                                <i class="material-icons md-48 text-green-600 hover:text-green-700">
                                check
                                </i>
                                <p class="text-md font-medium">Accept</p>
                            </a>
                        </div>
                        <div class="flex flex-col ml-2 cursor-pointer">
                            <a href="/reject/{{ $noti->data['offer_id'] }}/notifications/{{$noti->id}}"
                                role="button">
                                <i class="material-icons md-48 text-red-600 hover:text-red-700">
                                    close
                                </i>
                            </a>
                            <p class="text-md font-medium">Reject</p>
                        </div>
                    </div>
            </div>
            @endif
            @endforeach



                @foreach (Auth::user()->unreadNotifications as $noti)

                    @if( class_basename($noti->type) == "OfferTeam")

                        <li><i class="material-icons">
                            transfer_within_a_station
                            </i> Offer from <a href="/teams/{{$noti->data['team_id']}}"> Team {{ $noti->data['team_name'] }} </a>  <a
                            href="/accept/{{ $noti->data['offer_id'] }}/notifications/{{$noti->id}}" class="btn btn-primary btn-lg active"
                            role="button" aria-pressed="true">Accept</a>
                            <a href="/reject/{{ $noti->data['offer_id'] }}/notifications/{{$noti->id}}" class="btn btn-danger btn-lg active"
                            role="button" aria-pressed="true">Reject</a>
                        </li>

                    @elseif ( class_basename($noti->type) == "AcceptOffer")

                            @if ($noti->data['offer_status'] == 'Accepted')

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>
                                    <a href="{{ url('/players/' . $noti->data['dota_id']) }}">
                                    {{ $noti->data['steam_name'] }}</a>
                                </strong> has accepts your offer

                                <form action="/notifications/{{$noti->id}}" method="post">
                                    {{ method_field('DELETE') }}
                                    @csrf

                                    <button type="submit" class="close" > <span aria-hidden="true">&times;</span>
                                    </button>
                                </form>
                            </div>
                            @endif

                    @elseif ( class_basename($noti->type) == "RejectOffer")
                        @if ($noti->data['offer_status'] == 'Rejected')
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>
                                            <a href="{{ url('/players/' . $noti->data['dota_id']) }}">
                                            {{ $noti->data['steam_name'] }}</a>
                                        </strong> has rejects your offer

                                        <form action="/notifications/{{$noti->id}}" method="post">
                                        {{ method_field('DELETE') }}
                                        @csrf

                                        <button type="submit" class="close" > <span aria-hidden="true">&times;</span>
                                        </button>
                                    </form>
                                </div>
                        @endif


                    @endif

                @endforeach
        </div>


 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card" >

                    <div class="card-body">
                      <h5 class="card-title text-center"><b>Notification center (User)</b> </h5>
                      <p class="card-text"></p>
                    </div>

                    @foreach (Auth::user()->unreadNotifications as $noti)

                    @if( class_basename($noti->type) == "OfferTeam")

                        <li>Offer from <a href="/teams/{{$noti->data['team_id']}}"> Team {{ $noti->data['team_name'] }} </a>  <a
                            href="/accept/{{ $noti->data['offer_id'] }}/notifications/{{$noti->id}}" class="btn btn-primary btn-lg active"
                            role="button" aria-pressed="true">Accept</a>
                            <a href="/reject/{{ $noti->data['offer_id'] }}/notifications/{{$noti->id}}" class="btn btn-danger btn-lg active"
                            role="button" aria-pressed="true">Reject</a>
                        </li>

                    @elseif ( class_basename($noti->type) == "AcceptOffer")

                            @if ($noti->data['offer_status'] == 'Accepted')

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>
                                    <a href="{{ url('/players/' . $noti->data['dota_id']) }}">
                                    {{ $noti->data['steam_name'] }}</a>
                                </strong> has accepts your offer

                                <form action="/notifications/{{$noti->id}}" method="post">
                                    {{ method_field('DELETE') }}
                                    @csrf

                                    <button type="submit" class="close" > <span aria-hidden="true">&times;</span>
                                    </button>
                                </form>
                            </div>
                            @endif

                    @elseif ( class_basename($noti->type) == "RejectOffer")
                        @if ($noti->data['offer_status'] == 'Rejected')
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>
                                            <a href="{{ url('/players/' . $noti->data['dota_id']) }}">
                                            {{ $noti->data['steam_name'] }}</a>
                                        </strong> has rejects your offer

                                        <form action="/notifications/{{$noti->id}}" method="post">
                                        {{ method_field('DELETE') }}
                                        @csrf

                                        <button type="submit" class="close" > <span aria-hidden="true">&times;</span>
                                        </button>
                                    </form>
                                </div>
                        @endif


                    @endif

                @endforeach
                <div class="card-body">
                    <h5 class="card-title text-center"><b>Notification center (Team)</b> </h5>
                    <p class="card-text"></p>
                  </div>
                    @foreach (Auth::user()->unreadNotifications as $noti)

                        @if( class_basename($noti->type) == "OfferScrim")

                        <li>Invitation to scrim with <a href="/teams/{{$noti->data['team_id']}}"> Team {{ $noti->data['team_name'] }}</a> on {{ $noti->data['offer_date'] }} at {{ $noti->data['offer_time'] }}
                            <a href="/scrims/accept/{{ $noti->data['offer_id'] }}/notifications/{{ $noti->id}}"
                                class="btn btn-primary btn-lg active" role="button"
                                aria-pressed="true">Accept
                            </a>

                            <a href="/scrims/reject/{{ $noti->data['offer_id'] }}/notifications/{{ $noti->id}}"
                                class="btn btn-danger btn-lg active"
                                role="button" aria-pressed="true">Reject
                            </a>
                            </li>

                        @elseif( class_basename($noti->type) == "AcceptScrim")

                            @if ($noti->data['offer_status'] == 'Accepted')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>
                                    Team {{ $noti->data['team_name']}}
                                </strong>has aggreed to have a <a href="{{url('/scrims-schedule')}}">scrim</a>  with you on {{ $noti->data['offer_date'] }} at {{ $noti->data['offer_time'] }}

                                <form action="/notifications/{{$noti->id}}" method="post">
                                    {{ method_field('DELETE') }}
                                    @csrf

                                    <button type="submit" class="close" > <span aria-hidden="true">&times;</span>
                                    </button>
                                </form>
                            </div>
                            @endif

                        @elseif( class_basename($noti->type) == "RejectScrim")
                            @if ($noti->data['offer_status'] == 'Rejected')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>
                                    Team {{ $noti->data['team_name']}}
                                </strong>has rejected to have a <a href="{{url('/scrims-schedule')}}">scrim</a>  with you on {{ $noti->data['offer_date'] }} at {{ $noti->data['offer_time'] }}

                                <form action="/notifications/{{$noti->id}}" method="post">
                                    {{ method_field('DELETE') }}
                                    @csrf

                                    <button type="submit" class="close" > <span aria-hidden="true">&times;</span>
                                    </button>
                                </form>
                            </div>
                            @endif
                        @endif

                    @endforeach

                    @if (session('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ session('success') }}</li>
                        </ul>
                    </div>
                @endif
                @if (session('reject'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{{ session('reject') }}</li>
                    </ul>
                </div>
            @endif
                  </div>

            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection

