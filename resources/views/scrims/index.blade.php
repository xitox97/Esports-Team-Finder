@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Team that available to Scrim</div>

                <div class="card" >





                    <div class="card-body">
                     @foreach ($teams as $item)
                    <li> <a href="/teams/{{$item->id}}">{{$item->name }}</a> <a href="/scrims/add/{{$item->id}}" class="btn btn-success"
                        role="button" >Invite for scrim</a> </li><br>
                     @endforeach
                    </div>

                    @if (session('captain'))
                    <div class="alert alert-warning">
                        <ul>
                            <li>{{ session('captain') }}</li>
                        </ul>
                    </div>
                    @endif
                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
