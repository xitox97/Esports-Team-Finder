@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register Achievements</div>

                <div class="card-body">
                    <form method="POST" action="/players/{{$id}}/achievements/create">
                        @csrf

                        <div class="form-group row">
                            <label for="tournament_name" class="col-md-4 col-form-label text-md-right">Tournament Name</label>

                            <div class="col-md-6">
                                <input id="tournament_name" type="text" class="form-control @error('tournament_name') is-invalid @enderror" name="tournament_name" value="{{ old('tournament_name') }}" required autocomplete="tournament_name" autofocus>

                                @error('tournament_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">Date</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="place" class="col-md-4 col-form-label text-md-right">Place</label>
                                    <div class="col-md-6">
                                        <select id="place" class="custom-select" name="place">
                                        <option selected>Select place</option>
                                            <option value="1">Champion</option>
                                            <option value="2">Top 4</option>
                                            <option value="3">Top 8</option>
                                            <option value="4">Top 18</option>
                                            <option value="5">Other</option>
                                        </select>
                                        @error('place')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                        </div>

                        <div class="form-group row">
                                <label for="team" class="col-md-4 col-form-label text-md-right">Team Name</label>

                                <div class="col-md-6">
                                    <input id="team" type="text" class="form-control @error('team') is-invalid @enderror" name="team" value="{{ old('team') }}" required autocomplete="team" autofocus>

                                    @error('team')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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

