@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recommendation</div>
                <div class="card-body">
                    <form method="POST" action="/players/recommendation">
                        @csrf

                        <div class="form-group row">
                                <label for="player_role" class="col-md-4 col-form-label text-md-right">Player Role:</label>
                                    <div class="col-md-6">
                                        <select id="player_role" class="custom-select" name="player_role">
                                        <option selected>Select rank</option>
                                            <option value="core">Core</option>
                                            <option value="support">Support</option>
                                        </select>
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
                                        <select id="position" class="custom-select" name="position">
                                        <option selected>Select Position</option>
                                            <option value="carry">Carry</option>
                                            <option value="mid">Mid</option>
                                            <option value="offlaner">Offlaner</option>
                                            <option value="roamer">Roamer</option>
                                            <option value="support">Support</option>
                                        </select>
                                        @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        @if (session('constraint'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                <li>{{ session('constraint') }}</li>
                                            </ul>
                                        </div>
                                @endif
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="rank" class="col-md-4 col-form-label text-md-right">Rank</label>
                                <div class="col-md-6">
                                    <select id="rank" class="custom-select" name="rank">
                                    <option selected>Select rank</option>
                                        <option value="uncalibrated">Uncalibrated</option>
                                        <option value="herald">Herald</option>
                                        <option value="guardian">Guardian</option>
                                        <option value="crusader">Crusader</option>
                                        <option value="archon">Archon</option>
                                        <option value="legend">legend</option>
                                        <option value="ancient">ancient</option>
                                        <option value="divine">divine</option>
                                        <option value="immortal">immortal</option>
                                    </select>
                                    @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                    </div>
                        <div class="form-group row">
                                <label for="experience" class="col-md-4 col-form-label text-md-right">Experience:</label>
                                    <div class="col-md-6">
                                        <select id="experience" class="custom-select" name="experience">
                                        <option selected>Select experience</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
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
                        <select id="tournament" class="custom-select" name="tournament">
                            <option selected>Open this select menu</option>
                            @foreach($tours as $tour)
                                <option value="{{$tour->id}}">{{$tour->name}}</option>
                            @endforeach
                          </select>
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
