@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">


        @foreach ($tournament as $item)


        <div class="col-md-4">
            <div class="card">
            <div class="card-header">{{ $item->name }}</div>

                <div class="card" >
                    <div class="card-body">
                        <img src="{{  asset('storage/tour/' . $item->image) }}" class="img-fluid mb-3">
                        <h5 class="card-title text-center"><b>Prize Pool:</b> RM {{ $item->prizepool }}</h5>
                        <p class="card-text"></p>
                    </div>
                    <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item"><b>Organizer:</b> {{ $item->organizer }}</li>
                        <li class="list-group-item"><b>Date:</b> {{ $item->start_date }} until {{ $item->end_date }}</li>
                        <li class="list-group-item"><b>Venu:</b> {{ $item->venue }}</li>
                        <li class="list-group-item"><b>State:</b> {{ $item->state }}  </li>

                    </ul>
                  </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
