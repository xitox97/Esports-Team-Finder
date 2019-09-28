@extends('layouts.app')

@section('content')
    <div class="mx-auto bg-white shadow-lg rounded p-6">
        <form class="w-full max-w-lg" method="POST" action="/players/{{$id}}/achievements/create">
            @csrf
            <div class="flex flex-wrap -mx-3 ">
              <div class="w-full px-3 mb-2">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  Tournament Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700
                border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                focus:bg-white  focus:shadow-outline" id="grid-first-name" type="text">
              </div>
            </div>

            <div class="flex flex-wrap -mx-3 ">
                    <div class="w-full px-3 mb-2">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Place
                      </label>
                      <div class="w-full mb-3 ">
                            <select class="block appearance-none w-full bg-gray-200 border
                            border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded
                            leading-tight focus:outline-none focus:shadow-outline">
                            <option>Select place</option>
                            <option value="1">Champion</option>
                            <option value="2">Top 4</option>
                            <option value="3">Top 8</option>
                            <option value="4">Top 18</option>
                            <option value="5">Other</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                          </div>
                    </div>
                  </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Password
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
                <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-2">
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                  City
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Albuquerque">
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                  State
                </label>
                <div class="relative">
                  <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    <option>New Mexico</option>
                    <option>Missouri</option>
                    <option>Texas</option>
                  </select>
                  <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                  </div>
                </div>
              </div>
              <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                  Zip
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210">
              </div>
            </div>
          </form></div>



{{-- <div class="container">
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
</div> --}}
@endsection

