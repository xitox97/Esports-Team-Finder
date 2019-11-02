<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>
<body class="h-screen">
    <div id="app" class="flex h-auto max-w-full" >
        <div class="flex  flex-col  items-start justify-start h-screen w-2/4 ">
            <div class="w-full">
                    <form class="bg-white rounded px-32 mb-4 antialiased pt-8" method="POST" action="{{ route('register') }}">
                            @csrf
                    <p class=" text-left font-extrabold text-4xl text-black mb-2">Let's hunt some players!</p>
                    <p class=" text-left font-medium text-lg text-indigo-700 mb-3">Sign up now to start creating your Dream Team!</p>
                    <p class=" text-left font-base text-md text-black mb-10">Already have an account?
                        <a href="/login" class="text-indigo-700 hover:text-indigo-800 cursor-pointer font-medium">
                            Log in.</a></p>
                            <div class="flex flex-wrap -mx-3 mb-3">
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block capitalize tracking-wide text-gray-700 text-md font-semibold mb-2" for="grid-last-name">
                                        Full Name
                                    </label>
                                    <input class="appearance-none block w-full text-gray-700 border border-gray-500 rounded
                                    py-3 px-4 leading-tight focus:outline-none focus:border-indigo-600"
                                    type="text" placeholder="Enter your full name" name="name" required>
                                    @error('name')
                                    <p class="text-red-500 text-md italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block capitalize tracking-wide text-gray-700 text-md font-semibold mb-2" for="grid-last-name">
                                        Age
                                    </label>
                                    <input class="appearance-none block w-full text-gray-700 border border-gray-500 rounded
                                    py-3 px-4 leading-tight focus:outline-none focus:border-indigo-600" id="grid-last-name"
                                    type="text" placeholder="Enter your age" name="age" required>
                                    @error('age')
                                        <p class="text-red-500 text-md italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full  px-3 mt-5">
                                    <label class="block capitalize tracking-wide text-gray-700 text-md font-semibold mb-2" for="grid-last-name">
                                        E-mail
                                    </label>
                                    <input class="appearance-none block w-full text-gray-700 border border-gray-500 rounded
                                    py-3 px-4 leading-tight focus:outline-none focus:border-indigo-600" id="grid-last-name"
                                    type="email" placeholder="Enter your valid email address" name="email" required>
                                    @error('email')
                                        <p class="text-red-500 text-md italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- <div class="w-full md:w-1/2 px-3 mt-5">
                                    <label class="block capitalize tracking-wide text-gray-700 text-md font-semibold mb-2" for="grid-last-name">
                                        Phone
                                    </label>
                                    <input class="appearance-none block w-full text-gray-700 border border-gray-500 rounded
                                    py-3 px-4 leading-tight focus:outline-none focus:border-indigo-600"
                                    type="text" placeholder="Enter your phone number" required>
                                </div> --}}
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-3">
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block capitalize tracking-wide text-gray-700 text-md font-semibold mb-2" for="grid-state">
                                        City
                                    </label>
                                    <input class="appearance-none block w-full text-gray-700 border border-gray-500 rounded
                                    py-3 px-4 leading-tight focus:outline-none focus:border-indigo-600"
                                    type="text" placeholder="Enter your city" name="area" required>
                                    @error('area')
                                    <p class="text-red-500 text-md italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                    <label class="block capitalize tracking-wide text-gray-700 text-md font-semibold mb-2" for="grid-state">
                                        State
                                    </label>
                                    <div class="relative">
                                        <select class="block appearance-none w-full border border-gray-500
                                        text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none
                                        focus:border-indigo-600 " name="state" required>
                                        <option selected>Select state</option>
                                        <option value="Johor">Johor</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Kelantan">Kelantan</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Penang">Penang</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Terengganu">Terengganu</option>
                                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                                        <option value="Labuan">Labuan</option>
                                        <option value="Putrajaya">Putrajaya</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                    @error('state')
                                    <p class="text-red-500 text-md italic">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block capitalize tracking-wide text-gray-700 text-md font-semibold mb-2">
                                    Password
                                    </label>
                                    <input class="appearance-none block w-full  text-gray-700 border  border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none  focus:border-indigo-600"
                                    type="password" id="password" placeholder="*****" name="password" required>
                                    @error('password')
                                    <p class="text-red-500 text-md italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block capitalize tracking-wide text-gray-700 text-md font-semibold mb-2">
                                        Confirm Password
                                    </label>
                                    <input class="appearance-none block w-full  text-gray-700 border  border-gray-500 rounded py-3 px-4 mb-3
                                    leading-tight focus:outline-none  focus:border-indigo-600" type="password"
                                    placeholder="*****" name="password_confirmation" required id="password-confirm" required>

                                </div>
                                </div>
                                <div class="flex flex-col justify-center items-center">
                                    <button class="btn-indigo text-white font-bold py-2 px-4 rounded-full w-64 shadow-md mt-4" type="submit">
                                            Sign Up
                                    </button>
                                    <a href="/" class=" bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded-full w-64 shadow-md mt-2 text-center
                                    ">Back</a>
                                </div>
                    </form>
                    <p class="text-center text-indigo-700 text-xs">
                      &copy;2019 DotaHunt. All rights reserved.
                    </p>
                  </div>
        </div>
        <div class="bg-cover bg-center h-auto max-w-full w-2/4" style="background-image: url({{asset('img/3.jpg')}})">
        </div>
    </div>
</body>
</html>





{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">City</label>

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
                            <label for="state" class="col-md-4 col-form-label text-md-right">Region</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>

                                @error('state')
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
