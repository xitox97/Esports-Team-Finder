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
    .bg-gradient
    {
        background-image: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);
    }

.gradient{
    background: #8E2DE2;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #4A00E0, #8E2DE2);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #4A00E0, #8E2DE2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}


</style>
</head>
<body class="h-screen">
    <div id="app" class="flex flex-row-reverse h-auto max-w-full" >
        <div class="flex  flex-col  items-center justify-center h-screen w-2/4 bg-gradient">
            <div class="w-full max-w-md">
                    <form class="bg-white shadow-md rounded px-8 pt-16 pb-12 mb-4 antialiased" method="POST" action="{{ route('login') }}">
                            @csrf
                    <p class=" text-center font-medium text-md text-gray-500 mb-1">Welcome Back!</p>
                    <p class=" text-center font-extrabold text-2xl text-black mb-6">Login Your Account</p>
                      <div class="mb-4 border-b-2 border-indigo-500 py-2">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                          Email
                        </label>
                        <input name="email" placeholder="Enter your email" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" id="email" type="text" >
                      </div>

                      <div class="mb-4 border-b-2 border-indigo-500 py-2">
                            <label class="block text-gray-700 text-sm font-bold  mb-2" for="password">
                                    Password
                            </label>
                            <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2
                            leading-tight focus:outline-none" id="password" name="password" type="password" placeholder="***************">
                          </div>
                          @error('email')
                            <p class="text-red-500 text-xs italic -mt-3 text-center">{{ $message }}</p>
                    @enderror
                      <div class="flex flex-col items-center justify-center">
                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full w-64 shadow-md mt-4" type="submit">
                                    Login
                            </button>
                            <a class="inline-block align-baseline font-bold text-sm text-gray-600 hover:text-blue-800 mt-3" href="register">
                                Forgot Password?
                              </a>
                            <a class="inline-block align-baseline font-bold text-sm text-black hover:text-blue-800 mt-3" href="register">
                                    Create New Account?
                                  </a>
                      </div>
                    </form>
                    <p class="text-center text-gray-500 text-xs">
                      &copy;2019 DotaHunt. All rights reserved.
                    </p>
                  </div>
        </div>
        <div class="bg-cover bg-center h-auto max-w-full w-2/4" style="background-image: url({{asset('img/champ.jpg')}})">
        </div>
    </div>
</body>
</html>
