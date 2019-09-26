<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <!-- Styles -->

    </head>
    <body class="flex h-screen">

        <side-bar class="w-2/12 flex flex-col bg-indigo-800">
            <top-bar class="h-24  border-b-1  flex items-center border-black">
                    <h1 class="text-white text-2xl font-sans m-auto">Dream Team</h1>
            </top-bar>
            <menu-bar class="h-full flex flex-col ">
                    <a href="#" class="text-lg font-semibold mb-10 mt-12 ml-24 text-white">Overview</a>
                    <a href="#" class="text-lg font-semibold mb-10 ml-24 text-white">Achievements</a>
                    <a href="#" class="text-lg font-semibold mb-10 ml-24 text-white">Tournaments</a>
                    <a href="#" class="text-lg font-semibold mb-10 ml-24 text-white">Teams</a>
                    <a href="#" class="text-lg font-semibold text-white ml-24">Scrims</a>
            </menu-bar>


        </side-bar>

        <main-div class="w-10/12 flex flex-col">

                    <header class="h-24 flex justify-between">
                    <div class="w-8 flex items-center ml-12">
                        <svg  class="w-8" xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                        <line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </div>
                    <div class="flex items-center justify-around mr-12">
                        {{-- <h1 class=" text-2xl font-sans m-auto">Dream Team</h1> --}}
                        <div class="mx-3">
                            <svg class="w-6" xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                            <path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path>
                            </svg>
                        </div>
                        <div class="mx-3">
                            <img  class="rounded-full h-12 w-12" src="{{Auth::user()->accounts->avatar_url}}" alt="">
                        </div>
                        <div class="mx-3">
                            <svg class="w-8" width="7px" height="20px" viewBox="0 0 7 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 3.8.1 (29687) - http://www.bohemiancoding.com/sketch -->
                                <title>menu_option [#1375]</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Dribbble-Light-Preview" transform="translate(-266.000000, -800.000000)" fill="#000000">
                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                            <path d="M212.333333,658 L214.666667,658 L214.666667,656 L212.333333,656 L212.333333,658 Z M210,660 L217,660 L217,654 L210,654 L210,660 Z M212.333333,651 L214.666667,651 L214.666667,649 L212.333333,649 L212.333333,651 Z M210,653 L217,653 L217,647 L210,647 L210,653 Z M212.333333,644 L214.666667,644 L214.666667,642 L212.333333,642 L212.333333,644 Z M210,646 L217,646 L217,640 L210,640 L210,646 Z" id="menu_option-[#1375]"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </header>

            <content-div class="bg-gray-200 h-screen">
                <div class="container mx-auto mt-16">
                content
            </div>
            </content-div>
        </main-div>


    </body>
</html>
