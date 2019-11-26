
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
<style>
.gradient{
    background: rgba(255, 255, 255, .9);

}


</style>
</head>
<body class="h-screen">
    <div id="app" class="flex  h-auto max-w-full" >
        <div class="bg-cover bg-center  max-w-full h-screen w-full flex items-center justify-center" style="background-image: url({{asset('img/wall.jpg')}})">
            <div class="w-full max-w-md">
                <form class="gradient shadow-md rounded px-8 pt-16 pb-12 mb-4 antialiased" method="POST" action="{{ route('password.email') }}">
                        @csrf
                <p class=" text-center font-extrabold text-2xl text-black mb-6">Reset Password</p>
                @if (session('status'))
                <p class="text-green-500 text-md italic -mt-3 text-center">{{ session('status') }}</p>

            @endif
                  <div class="mb-4 border-b-2 border-indigo-500 py-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                      Email
                    </label>
                    <input name="email" placeholder="Enter your email" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" id="email" type="text" >
                  </div>
                      @error('email')
                        <p class="text-red-500 text-xs italic -mt-3 text-center">{{ $message }}</p>
                @enderror
                  <div class="flex flex-col items-center justify-center">
                        <button class="btn-indigo text-white font-bold py-2 px-4 rounded-full w-64 shadow-md mt-4" type="submit">
                            Send Password Reset Link
                        </button>
                        <a class="inline-block align-baseline font-bold text-sm text-black hover:text-blue-800 mt-2" href="/login">
                            Login
                          </a>
                  </div>
                </form>
                <p class="text-center text-white text-xs">
                  &copy;2019 DotaHunt. All rights reserved.
                </p>
              </div>
        </div>
    </div>
</body>
</html>
