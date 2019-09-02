@extends('layouts.app')

@section('content')
<div class="container">
        @if (session('interest'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session('interest') }}</li>
            </ul>
        </div>
        @elseif(session('notInterest'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('notInterest') }}</li>
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">


        @foreach ($tournament as $tour)


        <div class="col-md-4 mb-4">
            <div class="card">
            <div class="card-header">{{ $tour->name }}</div>

                <div class="card" >
                    <div class="card-body">
                        <img src="{{  asset('storage/tour/' . $tour->image) }}" class="img-fluid mb-3">
                        <h5 class="card-title text-center"><b>Prize Pool:</b> RM {{ $tour->prizepool }}</h5>
                        <p class="card-text"></p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><b>Organizer:</b> {{ $tour->organizer }}</li>
                        <li class="list-group-item"><b>Date:</b> {{ $tour->start_date }} until {{ $tour->end_date }}</li>
                        <li class="list-group-item"><b>Venu:</b> {{ $tour->venue }}</li>
                        <li class="list-group-item"><b>State:</b> {{ $tour->state }}  </li>

                        @php
                            $check = false;
                            foreach ($tour->users as $user) {
                                if($user->id == Auth::user()->id)
                                {
                                    $check = true;
                                    break;
                                }
                            }
                        @endphp

                        @if($check)
                            <a href="/tournaments/notInterested/{{ $tour->id }}" class="btn btn-danger" role="button" >Cancel</a>
                        @else
                            <a href="/tournaments/interested/{{ $tour->id }}" class="btn btn-success" role="button" >Interested</a>
                        @endif

                    </ul>
                  </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection
