<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <!-- Styles -->

        <style>
        .material-icons.md-36 { font-size: 32px; }
        </style>
    </head>
    <body class="flex h-screen font-sans ">

        <side-bar class="w-2/12 flex flex-col bg-indigo-800">
            <top-bar class="h-24 flex items-center border-b border-indigo-700 py-5">
                    <img class="w-7/12 mx-auto mt-3" src="https://fontmeme.com/permalink/190926/504d6783995232cf36f03478b4e00769.png" alt="netflix-font" border="0">
            </top-bar>
            <menu-bar class="h-full flex flex-col ">
                    <a href="#" class="text-lg font-semibold mb-10 mt-12 ml-16 text-purple-400">
                            <i class="material-icons  align-middle">assessment</i>
                        <span class="align-middle ml-2">Overview</span>
                    </a>
                    <a href="#" class="text-lg font-semibold mb-10 ml-16 text-white"><i class="material-icons align-middle">
                            emoji_events
                            </i> <span class="align-middle  ml-2">Achievements</span>
                    </a>
                    <a href="#" class="text-lg font-semibold mb-10 ml-16 text-purple-400">
                            <i class="material-icons  align-middle">videogame_asset</i>
                        <span class="align-middle ml-2">Tournaments</span>
                    </a>
                    <a href="#" class="text-lg font-semibold mb-10 ml-16 text-purple-400">
                            <i class="material-icons  align-middle">group</i>
                        <span class="align-middle ml-2">Teams</span>
                    </a>
                    <a href="#" class="text-lg font-semibold mb-10 ml-16 text-purple-400">
                            <i class="material-icons  align-middle">sports_kabaddi</i>
                        <span class="align-middle ml-2">Scrims</span>
                    </a>

            </menu-bar>
            <div class="flex justify-center items-center py-6 pr-6 cursor-pointer bg-purple-800 border-t border-indigo-700 ">
                    <i class="material-icons mr-3 align-middle font-semibold text-white">
                            power_settings_new
                            </i>
                    <span class="font-semibold text-white text-xl align-middle">
                        log out
                    </span>
            </div>
        </side-bar>
        <main-div class="w-10/12 flex flex-col">
                    <header class="h-24 flex justify-between border-b-2 border-gray-300 shadow-xl">
                        <div class="w-8 flex items-center ml-12">
                                <i class="material-icons md-36 cursor-pointer">
                                        menu_open
                                        </i>
                        </div>
                        <div class="flex items-center justify-around mr-12">
                            {{-- <h1 class=" text-2xl font-sans m-auto">Dream Team</h1> --}}
                            <div class="mx-3">
                                    <i class="material-icons mt-1 text-yellow-500 md-36 cursor-pointer">
                                            notifications_none
                                            </i>
                            </div>
                            <div class="mx-3">
                                <img  class="rounded-full h-12 w-12 cursor-pointer" src="{{Auth::user()->accounts->avatar_url}}" alt="">
                            </div>
                            <div class="mx-3">
                                    <i class="material-icons md-36 cursor-pointer">
                                            more_horiz
                                            </i>
                            </div>
                        </div>
                    </header>
                    <content-div class="bg-gray-200 h-screen">
                        <div class="container mx-auto mt-16">
                            <div class="flex">
                                    <div class="w-2/3">
                                        <div class="bg-white shadow-lg text-center rounded ">
                                            <table class="border-collapse w-full">
                                                <thead>
                                                    <th class="uppercase border-b border-gray-400 py-4 ">#</th>
                                                    <th class="uppercase border-b border-gray-400 py-4 ">Tournament Name</th>
                                                    <th class="uppercase border-b border-gray-400 py-4 ">Team</th>
                                                    <th class="uppercase border-b border-gray-400 py-4 ">Place</th>
                                                    <th class="uppercase border-b border-gray-400 py-4 ">Date</th>
                                                </thead>
                                                <tbody>
                                                    <tr class="hover:bg-gray-200">
                                                        <td class="py-4 px-6 border-b border-gray-300">1</td>
                                                        <td class="py-4 px-6 border-b border-gray-300">KL Major 2</td>
                                                        <td class="py-4 px-6 border-b border-gray-300">Liquid</td>
                                                        <td class="py-4 px-6 border-b border-gray-300">Champion</td>
                                                        <td class="py-4 px-6 border-b border-gray-300">12/02/2012</td>
                                                    </tr>
                                                    <tr class="hover:bg-gray-200">
                                                            <td class="py-4 px-6 border-b border-gray-300">2</td>
                                                            <td class="py-4 px-6 border-b border-gray-300">KL Major 2</td>
                                                            <td class="py-4 px-6 border-b border-gray-300">Liquid</td>
                                                            <td class="py-4 px-6 border-b border-gray-300">Champion</td>
                                                            <td class="py-4 px-6 border-b border-gray-300">12/02/2012</td>
                                                        </tr>
                                                        <tr class="hover:bg-gray-200">
                                                            <td class="py-4 px-6 border-b border-gray-300">3</td>
                                                            <td class="py-4 px-6 border-b border-gray-300">KL Major 2</td>
                                                            <td class="py-4 px-6 border-b border-gray-300">Liquid</td>
                                                            <td class="py-4 px-6 border-b border-gray-300">Champion</td>
                                                            <td class="py-4 px-6 border-b border-gray-300">12/02/2012</td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="w-auto ml-24 mt-1">
                                            <button class="bg-transparent hover:bg-indigo-700 text-indigo-800
                                            font-semibold hover:text-white py-2 px-4 border border-indigo-800
                                            hover:border-transparent rounded">
                                                New Achievement
                                            </button>
                                        </div>
                            </div>
                        </div>
                    </content-div>
        </main-div>


    </body>
</html>
