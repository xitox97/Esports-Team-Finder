@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/players/recommendation">
                        @csrf

                        <div class="form-group row">
                            <label for="player_role" class="col-md-4 col-form-label text-md-right">Player Role:</label>

                            <div class="col-md-6">
                                <input id="player_role" type="text" class="form-control @error('player_role') is-invalid @enderror" name="player_role" placeholder ="core/support" value="{{ old('player_role') }}" required autocomplete="player_role" autofocus>

                                @error('player_role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="position" class="col-md-4 col-form-label text-md-right">position</label>

                            <div class="col-md-6">
                                <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" placeholder ="carry/mid/support/roamer/offlaner" name="position" value="{{ old('position') }}" required autocomplete="position">

                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rank" class="col-md-4 col-form-label text-md-right">Rank</label>

                            <div class="col-md-6">
                                <input id="rank" type="text" class="form-control @error('rank') is-invalid @enderror" placeholder ="archon/divine/etc" name="rank" value="{{ old('rank') }}"required autocomplete="new-rank">

                                @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="experience" class="col-md-4 col-form-label text-md-right">experience</label>

                            <div class="col-md-6">
                                <input id="experience" type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ old('experience') }}" required autocomplete="experience" autofocus>

                                @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tournament" class="col-md-4 col-form-label text-md-right">tournament</label>

                            <div class="col-md-6">
                                <input id="tournament" type="text" class="form-control @error('tournament') is-invalid @enderror" name="tournament" value="{{ old('tournament') }}" required autocomplete="tournament" autofocus>

                                @error('tournament')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
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
