{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/teams" enctype="multipart/form-data">
                        @csrf


                        <input name="captain_id" type="hidden" value="{{ $id }}">
                        <input name="qtty_member" type="hidden" value="1">


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Team Name:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">Area</label>

                            <div class="col-md-6">
                                <input id="area" type="text" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" required autocomplete="area" autofocus>

                                @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="image">Team Image</label>
                            <input type="file" name="image" id="image">


                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / Team / Create </span>
</section>
<div class="container ml-20 mt-12 max-w-6xl mr-2">
    <div class="flex flex-col justify-center">
        <p class=" text-black font-bold text-2xl mb-2">Create Team</p>
        <form method="POST" action="/teams" enctype="multipart/form-data" class="bg-white rounded-lg shadow-lg p-2">
                @csrf
                <input name="captain_id" type="hidden" value="{{ $id }}">
                <input name="qtty_member" type="hidden" value="1">
                <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                          <label class="block capitalize tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-first-name">
                            Team Name
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                          <p class="text-red-500 text-md italic">Please fill out this field.</p>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                          <label class="block capitalize tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-last-name">
                            Area
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
                        </div>
                      </div>
                      <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                          <label class="block capitalize tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-city">
                            City
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Albuquerque">
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                          <label class="block capitalize tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-state">
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
                          <label class="block capitalize tracking-wide text-gray-700 text-md font-bold mb-2" for="grid-zip">
                            Zip
                          </label>
                          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210">
                        </div>
                      </div>






            </form>
    </div>
</div>
@endsection
