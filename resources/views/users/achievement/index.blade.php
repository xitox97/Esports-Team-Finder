@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="card">
                        <div class="card-header">Past Achievement</div>

                        <div class="card" >
                        <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tournament Name</th>
                                    <th>Team</th>
                                    <th>Place</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users->achievements as $achievement)
                                    <tr>
                                        <td>{{$loop->index + 1}}</th>
                                        <td>{{$achievement->tournament_name}}</td>
                                        <td>{{$achievement->team}}</td>
                                        <td>{{$achievement->place}}</td>
                                        <td>{{$achievement->date}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                            <td colspan="4" class="text-center"> <b> No Pasts Achiements</b> </td>
                                    </tr>
                                @endforelse

                            </tbody>
                            </table>
                        </div>
                </div>
        </div>
        @if(Auth::user()->accounts->dota_id == $users->accounts->dota_id)
        <div class="col-md-4">
                <div class="card">
                        <div class="card-header">Action</div>

                        <div class="card p-3" >

                                <a href="/players/{{$users->accounts->dota_id}}/achievements/create" class="btn btn-primary "
                                    role="button" >Add Past Achiement</a>
                            </div>
                        </div>
                </div>
        @endif
        </div>
        </div>
    </div>
</div>
@endsection
