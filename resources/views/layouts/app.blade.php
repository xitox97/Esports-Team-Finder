<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

<style>
    .rankMedal {
    position: relative;
    display: flex;
    flex-direction: column;
    -webkit-box-pack: center;
    justify-content: center;
    filter: drop-shadow(rgba(0, 0, 0, 0.3) 2px -2px 2px) drop-shadow(rgba(0, 0, 0, 0.3) 2px -2px 2px);
    }

    .rankMedal-small {
    position: relative;
    display: flex;
    flex-direction: column;
    -webkit-box-pack: center;
    justify-content: center;
    filter: drop-shadow(rgba(0, 0, 0, 0.3) 2px -2px 2px) drop-shadow(rgba(0, 0, 0, 0.3) 2px -2px 2px);
    }

    .rankTierContainer {
    display: flex;
    /* flex-direction: column; */
    -webkit-box-pack: center;
    justify-content: center;
    }

    .rankMedal img {
    width: 124px;
    height: 124px;
    }

    .rankMedal-small img {
    width: 60px;
    height: 60px;
    }

    .rankMedal-star {
    position: absolute;
}

.topContainer {
    display: flex;
    flex-direction: row;
}


</style>


</head>
<body>

    <div id="app" class="flex h-screen font-sans">
            <sidebar-component v-bind:is-open="isOpen" v-bind:user="{{ Auth::User()->accounts}}"></sidebar-component>
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
                                <i  class="material-icons mt-1 text-yellow-500 md-36 cursor-pointer">
                                        notifications_none
                                        </i>
                        </div>
                        <div class="mx-3">
                            <img  class="rounded-full h-12 w-12 cursor-pointer" src="{{Auth::user()->accounts->avatar_url}}" alt="">
                        </div>
                        <div class="mx-3">
                                <i  v-click-outside="hide" @click="onoff" class="material-icons md-36 cursor-pointer" aria-haspopup="true" :aria-expanded="dropOpen">
                                        more_horiz
                                        </i>
                        </div>
                        <div class="mt-16">
                            <div v-show="opened" id="dropdown" class="absolute  rounded shadow right-0  bg-white w-1/12">
                                    <a href="#" class="block text-default py-2 px-4 no-underline hover:underline text-md leading-loose ml-1 my-1 hover:bg-gray-200">Setting</a>
                                    <a class="block text-default py-2 px-4 no-underline hover:underline text-md leading-loose ml-1 mb-1 hover:bg-gray-200" href="/logout"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        </div>

                    </div>
                </header>

                <section id="content-div" class="bg-gray-200 h-screen">
                                @yield('content')
                </section>
            </section>


    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
