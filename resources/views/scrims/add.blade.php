@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Invite Scrims</div>

                <div class="card-body">
                    <form method="POST" action="/scrims">
                        @csrf


                    <input name="team_id" type="hidden" value="{{ $myTeam->id }}">
                        <input name="opponent_id" type="hidden" value="{{ $team->id }}">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Opponent Team</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $team->name }}" required autofocus disabled>

                             </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_time" class="col-md-4 col-form-label text-md-right">Date and time</label>

                            <div class="col-md-6">
                                <input id="date_time" type="datetime-local" class="form-control" name="date_time" required autofocus>

                             </div>


                        </div>

                        @error('date_time')
                             <div class="alert alert-warning">
                                <ul>
                                    <li>{{ $message }}</li>
                                </ul>
                            </div>
                                @enderror


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Invite
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
