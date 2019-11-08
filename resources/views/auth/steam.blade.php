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
.material-icons.md-36 { font-size: 36px; }
.material-icons.md-48 { font-size: 48px; }

</style>


</head>
<body class="h-full">
        @php

            if(Auth::user()->accounts()->exists() == true){
                $playerUrl = 'players/'. Auth::user()->accounts->dota_id;
            }
            else{
                $playerUrl = 0;
            }
        @endphp
            <div id="app" class="flex font-sans min-h-screen">
                    <sidebar-component v-bind:is-open="isOpen" class="bg-sidebar flex flex-col w-2/12">
                        <a href="#"
                        class="text-lg font-semibold mb-10 mt-12  text-purple-400 hover:text-white cursor-not-allowed"
                      >
                        <i class="material-icons align-middle {{Request::is($playerUrl . '/stats', $playerUrl . '/heroes', '/stats', $playerUrl . '/totals',  'matches/*') ? 'text-white' : ''}}">assessment</i>
                        <span class="align-middle ml-2 {{Request::is($playerUrl . '/stats', $playerUrl . '/heroes', '/stats', $playerUrl . '/totals',  'matches/*') ? 'text-white' : ''}}">Overview</span>
                      </a>
                      <a
                      href="#"
                        class="text-lg font-semibold mb-10  cursor-not-allowed text-purple-400 hover:text-white"
                      >
                        <i class="material-icons align-middle {{Request::is($playerUrl . '/achievements', $playerUrl . '/achievements/*') ? 'text-white' : ''}}">emoji_events</i>
                        <span class="align-middle ml-2 {{Request::is($playerUrl . '/achievements', $playerUrl . '/achievements/*') ? 'text-white' : ''}}">Achievements</span>
                      </a>
                      <a
                        href="#"
                        class="text-lg font-semibold mb-10  text-purple-400 hover:text-white cursor-not-allowed"
                      >
                        <i class="material-icons align-middle {{Request::is('tournaments') ? 'text-white' : ''}}" >videogame_asset</i>
                        <span class="align-middle ml-2 {{Request::is('tournaments') ? 'text-white' : ''}}" >Tournaments</span>
                      </a>
                      <a
                        href="#"
                        class="text-lg font-semibold mb-10  text-purple-400 hover:text-white cursor-not-allowed"
                      >
                        <i class="material-icons align-middle {{Request::is('teams') ? 'text-white' : ''}}" >group</i>
                        <span class="align-middle ml-2 {{Request::is('teams') ? 'text-white' : ''}}" >Teams</span>
                      </a>
                      <a href="#" class="text-lg font-semibold mb-10  text-purple-400 hover:text-white cursor-not-allowed">
                        <i class="material-icons align-middle {{Request::is('scrims', 'scrims-schedule') ? 'text-white' : ''}}">sports_kabaddi</i>
                        <span class="align-middle ml-2 {{Request::is('scrims', 'scrims-schedule') ? 'text-white' : ''}}" >Scrims</span>
                      </a>
                      <a href="#" class="text-lg font-semibold mb-10  text-purple-400 hover:text-white cursor-not-allowed">
                        <i class="material-icons align-middle {{Request::is('players/list') ? 'text-white' : ''}}">face</i>
                        <span class="align-middle ml-2 {{Request::is('players/list') ? 'text-white' : ''}}" >Players</span>
                      </a>
                      <a href="#" class="text-lg font-semibold mb-10  text-purple-400 hover:text-white cursor-not-allowed">
                        <i class="material-icons align-middle {{Request::is('players/recommendation') ? 'text-white' : ''}}">search</i>
                        <span class="align-middle ml-2 {{Request::is('players/recommendation') ? 'text-white' : ''}}" >Recommendation</span>
                      </a>
                      <a href="#" class="text-lg font-semibold mb-10  text-purple-400 hover:text-white cursor-not-allowed">
                        <i class="material-icons align-middle {{Request::is('/map/search') ? 'text-white' : ''}}">search</i>
                        <span class="align-middle ml-2 {{Request::is('/map/search') ? 'text-white' : ''}}" >Find nearby</span>
                      </a>
                    </sidebar-component>
                    <section id="maindiv" class="flex flex-col bg-gray-900 w-10/12" v-bind:class=" { 'w-10/12': isOpen, 'w-screen': !isOpen }">
                        <header class="h-24 flex justify-between">
                            <div class="w-8 flex items-center ml-12">
                                   <i v-on:click="toggle"  class="material-icons md-36 cursor-pointer text-white">
                                            menu_open
                                            </i>
                            </div>
                            <div class="flex items-center justify-around mr-12">

                                <div class="mx-3">

                                        <div class="mr-3 cursor-pointer" v-click-outside="hideNoti" @click="noti" v-if="bell == false">
                                                <i class="material-icons mt-1 text-yellow-500 md-36">notifications
                                                </i>
                                        </div>

                                </div>

                                <div class="mx-3">
                                    @if(Auth::user()->accounts()->exists() == true)
                                    <img  class="rounded-full h-12 w-12 cursor-pointer" src="{{Auth::user()->accounts->avatar_url}}" alt="">
                                    @else
                                    <img src="{{asset('img/default.svg')}}" alt="" class="rounded-full h-12 w-12 cursor-pointer">
                                    @endif
                                </div>
                                <div class="mx-3">
                                        <i  v-click-outside="hide" @click="onoff" class="material-icons md-36 cursor-pointer text-white" aria-haspopup="true" :aria-expanded="opened">
                                                more_horiz
                                                </i>
                                </div>
                                <div class="mt-16">
                                    <transition name="fadedrop">
                                    <div v-show="opened" style="display: none;" id="dropdown" class="absolute  rounded shadow right-0  bg-white w-1/12">
                                            <a href="#" class="block text-default py-2 px-4 no-underline hover:underline
                                            text-md leading-loose ml-1 my-1 hover:bg-gray-200">Setting</a>
                                            <a href="#" class="block text-default py-2 px-4 no-underline hover:underline
                                             text-md leading-loose ml-1 my-1 hover:bg-gray-200">Inbox</a>
                                            <a class="block text-default py-2 px-4 no-underline hover:underline text-md leading-loose ml-1 mb-1 hover:bg-gray-200" href="/logout"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form2').submit();">
                                             {{ __('Logout') }}
                                         </a>
                                         <form id="logout-form2" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </transition>
                                </div>

                            </div>
                        </header>
                        <alert-component></alert-component>

                <section id="content-div" class="h-full pb-20 px-20">
                        <section id="breadcrumb" class="ml-4 pt-2 text-white font-medium tracking-wide">
                                <span class="italic text-sm">Home / Steam / Connect</span>
                            </section>
                            <div class="container ml-20 mt-12">

                                <div class="bg-dark-100 shadow-lg w-8/12 flex">
                                    <div class="w-3/12">
                                        <img src="{{ URL::to('/') }}/img/steam-icon.png" class="">
                                    </div>
                                    <div class="w-8/12 ml-4 bg-dark-100 flex flex-col items-start justify-center mb-10">
                                        <p class="text-2xl font-bold text-indigo-500">Steam</p>
                                        <p class=" text-xl font-semibold text-white">You need to connect to steam before you can proceed.</p>
                                        <p class="text-md font-base text-gray-500">Please enable "Expose Public Match Data" setting in the Dota 2 game client.</p>
                                    </div>
                                    <div class="w-auto flex flex-col items-start justify-center px-2">
                                        <div>
                                            <a href="/login/steam" class="btn-indigo text-white font-semibold py-3 px-8 rounded-full w-64
                                            shadow-md cursor-pointer flex-shrink-0">
                                                    Connect
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @if (session('error'))
                                <p class="italic ml-20 mt-3 text-red-500">{{ session('error') }}</p>
                                @endif

                            </div>

                </section>
            </section>


    </div>


</body>
</html>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">You need to connect your accounts with steam to continue</div>
                <div class="text-center">
                    <img src="{{ URL::to('/') }}/img/steam.png" alt="" class="w-50"><br>
                    <a href="/login/steam" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Connect</a>
                </div>
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                </div>


            </div>
        </div>
    </div>
</div> --}}


