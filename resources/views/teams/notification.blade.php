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


                    @foreach ($inviteNotis as $inviteNoti)
                    @if ($inviteNoti->status == 'pending')
                        <li>Invitation to scrim with <a href="/teams/{{$inviteNoti->team->id}}"> Team {{ $inviteNoti->team->name }} </a>  <a
                        href="/scrims/accept/{{ $inviteNoti->id }}" class="btn btn-primary btn-lg active"
                            role="button" aria-pressed="true">Accept</a>
                            <a href="/scrims/reject/{{ $inviteNoti->id }}" class="btn btn-danger btn-lg active"
                            role="button" aria-pressed="true">Reject</a>
                        </li>


                    @endif
                    @endforeach


                    @foreach ($acceptedNoti as $accept)


                    @if ($accept->status == 'Accepted')
                    <div class="alert alert-success">
                        <ul>
                            <li><b>Team {{ $accept->team->name}}</b> has aggreed to have a scrim with you on {{ $accept->date_time}}</li>
                        </ul>
                    </div>
                    @elseif ($accept->status == 'Rejected')
                    <div class="alert alert-warning">
                        <ul>
                            <li><b>Team {{ $accept->team->name}}</b> has rejected to have a scrim with you on {{ $accept->date_time}}</li>
                        </ul>
                    </div>
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
   {{-- {{ dd($dotas->accounts->toArray())}} --}}

                    {{-- {{ dd($dotas->name)}} --}}
