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


                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
