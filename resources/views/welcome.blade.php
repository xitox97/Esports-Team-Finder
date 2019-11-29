<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Roboto', sans-serif;
                height: 100%;
            }
            .mySlides {display:none;}
            .clip{
                -webkit-clip-path: polygon(48% 69%, 23% 72%, 0 66%, 0 0, 100% 0, 100% 64%, 87% 69%, 67% 72%);
                -webkit-shape-outside: polygon(48% 69%, 23% 72%, 0 66%, 0 0, 100% 0, 100% 64%, 87% 69%, 67% 72%);
                clip-path: polygon(48% 69%, 23% 72%, 0 66%, 0 0, 100% 0, 100% 64%, 87% 69%, 67% 72%);
            }
            .material-icons.md-18 { font-size: 14px; }
        .material-icons.md-24 { font-size: 22px; }
        .material-icons.md-big { font-size: 144px; }
        .filter{
            background-color: hsla(0,0%,0%, .55);
        }
        </style>
    </head>
    <body class="bg-gray-900 debug-screens">
            <div class="relative z-10 flex flex-col min-h-full bg-primary" >
                <div class="absolute inset-0 bg-local bg-bottom bg-cover clip" style="background-image:url({{asset('img/sniper.jpg')}})">
                </div>
                <header class="z-20 filter">
                        <div class="container px-6 py-2 mx-auto ">
                            <div class="flex">
                                <div class="flex items-baseline w-1/2">
                                    <a href="/" class="pt-1 mr-8 text-2xl font-bold tracking-wide text-white hover:text-pink-500">&lt;dotahunt/&gt;</a>
                                </div>
                                <div class="flex items-baseline w-1/4">
                                    <a href="#" class="py-3 mr-8 text-lg font-medium text-white hover:text-gray-500">Players</a>
                                    <a href="#" class="py-3 mr-8 text-lg font-medium text-white hover:text-gray-500">Teams</a>
                                    <a href="#" class="py-3 text-lg font-medium text-white hover:text-gray-500">Tournaments</a>
                                </div>
                                <div class="flex justify-end w-1/2">
                                    <a href="/login" class="py-3 mr-2 text-lg font-semibold">
                                        <span class="flex items-center text-white hover:text-gray-500">
                                        Sign in
                                        <i class="ml-1 material-icons md-18">arrow_forward</i>
                                        </span>
                                        </a>
                                </div>
                            </div>
                        </div>
                    </header>

                    <div class="container z-20 mx-auto mt-16">
                        <div class="flex justify-end">
                                <div id="section" class="flex flex-col items-end w-3/6 ">
                                    <div class="flex flex-col pt-2 mr-2 ">
                                        <p class="max-w-md px-4 mt-4 text-3xl font-extrabold text-center bg-purple-600">WELCOME TO DOTAHUNT</p>
                                        <p class="max-w-md pt-3 pb-2 mt-4 text-lg font-bold tracking-wide text-justify text-white">Dotahunt is a website for Dota 2 player to find and create team to participate tournament in Malaysia.</p>
                                    <div class="flex justify-center mt-10">
                                            <a href="/register" class="inline-block px-4 py-3 mt-3 mr-1 font-bold tracking-wide text-white bg-purple-800 rounded-lg shadow-lg hover:bg-purple-900">
                                                        START NOW
                                            </a>
                                    </div>
                                    </div>
                                </div>
                                {{-- <div id="section" class="flex flex-col items-end w-3/6 pt-2 mr-2">
                                    <p class="max-w-md px-4 text-4xl font-bold text-center text-black bg-white">THE ULTIMATE PLACE TO</p>
                                    <p class="max-w-md pt-3 pb-2 text-2xl font-bold text-white capitalize border-b-2 border-gray-600"> find players that are interested in local tournament</p>
                                    <p class="max-w-md pt-3 pb-2 text-2xl font-bold text-white capitalize border-b-2 border-gray-600"> find teammates and participate in local tournaments</p>
                                    <p class="max-w-md pt-3 pb-2 text-2xl font-bold text-white capitalize border-b-2 border-gray-600"> play practice match with another teams</p>
                                    <a href="/register" class="inline-block px-3 py-3 mt-3 mr-1 font-bold text-white bg-purple-700 rounded hover:bg-purple-800 ">LETS GET START</a>
                                </div> --}}
                        </div>
                </div>
                <div class="container z-20 mx-auto mt-48 mb-2">
                        <div id="bot-section" class="flex justify-center">
                            <div class="flex flex-col items-center mr-32">
                                    <img src="{{asset('img/statistic.png')}}">
                                            <p class="mt-2 text-2xl font-semibold text-white">Statistics</p>
                                            <p class="text-lg font-medium text-center text-gray-500">Watch and read player's in game statistics</p>
                            </div>

                            <div class="flex flex-col items-center mx-32 ">
                                   <img src="{{asset('img/game.png')}}">
                                            <p class="mt-2 text-2xl font-semibold text-white">Scrims</p>
                                            <p class="text-lg font-medium text-center text-gray-500">Find team to practice together</p>
                            </div>
                            <div class="flex flex-col items-center ml-32">
                                <img src="{{asset('img/search.png')}}">
                                            <p class="mt-2 text-2xl font-semibold text-white">Search</p>
                                            <p class="text-lg font-medium text-center text-gray-500">Find player based on your preferrences</p>
                            </div>
                        </div>
                </div>
                <footer class="z-20 w-full mt-auto bg-black">
                        <div class="container flex justify-between py-3 mx-auto">
                                <p class="text-sm text-gray-200">&copy;2019 DotaHunt. All rights reserved</p>
                                <p class="flex items-center text-sm text-gray-200"><i class="mr-2 material-icons">
                                        email
                                        </i>farhan.abdhadi@gmail.com</p>
                        </div>
            </footer>
            </div>

    </body>
</html>
