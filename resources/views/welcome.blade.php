<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <body>
        <div id="app" class="flex h-screen font-sans">
        <sidebar-component v-bind:is-open="isOpen"></sidebar-component>
        <section id="maindiv" class="flex flex-col" v-bind:class=" { 'w-10/12': isSmall, 'w-screen': isFull }">
                    <header class="h-24 flex justify-between border-b-2 border-gray-300 shadow-xl">
                        <div class="w-8 flex items-center ml-12">
                               <i v-on:click="toggle"  class="material-icons md-36 cursor-pointer">
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
                    <section id="content-div" class="bg-gray-200 h-screen">
                        <div class="container mx-auto mt-16">
                            <div class="flex">
                                    <div class="w-full ml-16">
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
                                                        <tr class="hover:bg-gray-200">
                                                                <td class="py-4 px-6 border-b border-gray-300">3</td>
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
                                                                <tr class="hover:bg-gray-200">
                                                                        <td class="py-4 px-6 border-b border-gray-300">3</td>
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
                                    <div class="w-1/3 ml-24 mt-2">
                                        <button class="bg-transparent hover:bg-indigo-700 text-indigo-800
                                            font-semibold hover:text-white py-2 px-4 border border-indigo-800
                                            hover:border-transparent rounded shadow-md">
                                            New Achievement
                                        </button>
                                    </div>
                            </div>
                        </div>
                    </section>
                </section>

    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
