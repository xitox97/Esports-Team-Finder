@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notification center</div>

                <div class="card" >

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
@endsection

