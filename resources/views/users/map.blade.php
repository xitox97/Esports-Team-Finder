<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userId" content="{{Auth::check() ? Auth::user()->id : ''}}">
    <meta name="noticount" content="{{count(Auth::user()->unreadNotifications)}}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.6.5/ol.css">
      <link rel="stylesheet" href="https://unpkg.com/ol-popup@4.0.0/src/ol-popup.css">
      <link href="https://cdn.jsdelivr.net/npm/ol-geocoder@latest/dist/ol-geocoder.min.css" rel="stylesheet">

<style>
.fadedrop-enter-active, .fadedrop-leave-active {
  transition: opacity .3s;
}
.fadedrop-enter, .fadedrop-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
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
            <sidebar-component v-bind:is-open="isOpen" v-bind:user="{{ Auth::User()->accounts}}">
                <a href="/{{$playerUrl}}/stats"
                class="text-lg font-semibold mb-10 mt-12 ml-16 text-purple-400"
              >
                <i class="material-icons align-middle {{Request::is($playerUrl . '/stats', $playerUrl . '/heroes', '/stats', $playerUrl . '/totals') ? 'text-white' : ''}}">assessment</i>
                <span class="align-middle ml-2 {{Request::is($playerUrl . '/stats', $playerUrl . '/heroes', '/stats', $playerUrl . '/totals') ? 'text-white' : ''}}">Overview</span>
              </a>
              <a
              href="/{{$playerUrl}}/achievements"
                class="text-lg font-semibold mb-10 ml-16 cursor-pointer text-purple-400"
              >
                <i class="material-icons align-middle {{Request::is($playerUrl . '/achievements', $playerUrl . '/achievements/*') ? 'text-white' : ''}}">emoji_events</i>
                <span class="align-middle ml-2 {{Request::is($playerUrl . '/achievements', $playerUrl . '/achievements/*') ? 'text-white' : ''}}">Achievements</span>
              </a>
              <a
                href="/tournaments"
                class="text-lg font-semibold mb-10 ml-16 text-purple-400"
              >
                <i class="material-icons align-middle {{Request::is('tournaments') ? 'text-white' : ''}}" >videogame_asset</i>
                <span class="align-middle ml-2 {{Request::is('tournaments') ? 'text-white' : ''}}" >Tournaments</span>
              </a>
              <a
                href="{{ url('/teams') }}"
                class="text-lg font-semibold mb-10 ml-16 text-purple-400"
              >
                <i class="material-icons align-middle {{Request::is('teams') ? 'text-white' : ''}}" >group</i>
                <span class="align-middle ml-2 {{Request::is('teams') ? 'text-white' : ''}}" >Teams</span>
              </a>
              <a href="/scrims" class="text-lg font-semibold mb-10 ml-16 text-purple-400">
                <i class="material-icons align-middle {{Request::is('scrims', 'scrims-schedule') ? 'text-white' : ''}}">sports_kabaddi</i>
                <span class="align-middle ml-2 {{Request::is('scrims', 'scrims-schedule') ? 'text-white' : ''}}" >Scrims</span>
              </a>
              <a href="/players/list" class="text-lg font-semibold mb-10 ml-16 text-purple-400">
                <i class="material-icons align-middle {{Request::is('players/list') ? 'text-white' : ''}}">face</i>
                <span class="align-middle ml-2 {{Request::is('players/list') ? 'text-white' : ''}}" >Players</span>
              </a>
              <a href="/players/recommendation" class="text-lg font-semibold mb-10 ml-16 text-purple-400">
                <i class="material-icons align-middle {{Request::is('players/recommendation') ? 'text-white' : ''}}">search</i>
                <span class="align-middle ml-2 {{Request::is('players/recommendation') ? 'text-white' : ''}}" >Recommendation</span>
              </a>
              <a href="/map/search" class="text-lg font-semibold mb-10 ml-16 text-purple-400">
                <i class="material-icons align-middle {{Request::is('/map/search') ? 'text-white' : ''}}">search</i>
                <span class="align-middle ml-2 {{Request::is('/map/search') ? 'text-white' : ''}}" >Find nearby</span>
              </a>
            </sidebar-component>
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
                            @if (count(Auth::user()->unreadNotifications))
                                <div class="mr-3 cursor-pointer" v-click-outside="hideNoti" @click="noti" v-bind:kira="{{count(Auth::user()->unreadNotifications)}}">
                                  <i class="material-icons mt-1 text-yellow-500 md-36">notifications_active</i>
                                  <span class="absolute -mt-2 -ml-2 text-white rounded-full bg-red-500 text-sm px-1">
                                    <p v-text="count"></p>
                                  </span>
                                </div>
                                <div v-show="notification" id="dropdowns" class="border rounded z-10 shadow  bg-white mt-3 absolute
                                right-0 text-center w-auto">

                              @foreach(Auth::user()->unreadNotifications as $noti)
                                  @include('notifications.' . snake_case(class_basename($noti->type)))
                              @endforeach

                                <noti-component v-bind:realnoti="true"></noti-component>
                                  <a href="http://teamfinder.test/notifications" class="block font-bold hover:bg-gray-200 leading-loose
                                  ml-1 my-1 no-underline px-4 py-2 text-default text-md">See All Notifications</a>
                                </div>
                            @else
                                <div class="mr-3 cursor-pointer" v-click-outside="hideNoti" @click="noti" v-if="bell == false">
                                        <i class="material-icons mt-1 text-yellow-500 md-36">notifications
                                        </i>
                                <span class="absolute -mt-2 -ml-2 text-white rounded-full bg-red-500 text-sm px-1">
                                    <p v-text="count"></p></span>
                                </div>
                                <div class="mr-3 cursor-pointer" v-click-outside="hideNoti" @click="noti" v-if="bell == true">
                                        <i
                                        class="material-icons mt-1 text-yellow-500   md-36">
                                        notifications_active
                                        </i>
                                    <span class="absolute -mt-2 -ml-2 text-white rounded-full bg-red-500 text-sm px-1">
                                        <p v-text="count"></p></span>
                                </div>
                                <div v-show="notification" id="dropdowns" class="rounded z-10 shadow  bg-white mt-3 absolute
                                right-0 text-center w-2/12">
                                    <noti-component v-bind:realnoti="bell"></noti-component>
                                    <a href="http://teamfinder.test/notifications" class="block font-bold hover:bg-gray-200 leading-loose ml-1 my-1 no-underline px-4 py-2 text-default text-md">
                                        See All Notifications</a>
                                    </div>
                            @endif
                        </div>

                        <div class="mx-3">
                            @if(Auth::user()->accounts()->exists() == true)
                            <img  class="rounded-full h-12 w-12 cursor-pointer" src="{{Auth::user()->accounts->avatar_url}}" alt="">
                            @else
                            <img src="{{asset('img/default.svg')}}" alt="" class="-mt-16 relative rounded-full w-48 shadow-lg">
                            @endif
                        </div>
                        <div class="mx-3">
                                <i  v-click-outside="hide" @click="onoff" class="material-icons md-36 cursor-pointer" aria-haspopup="true" :aria-expanded="opened">
                                        more_horiz
                                        </i>
                        </div>
                        <div class="mt-16">
                            <transition name="fadedrop">
                            <div v-show="opened" id="dropdown" class="absolute  rounded shadow right-0  bg-white w-1/12">
                                    <a href="/{{$playerUrl}}" class="block text-default py-2 px-4 no-underline hover:underline
                                    text-md leading-loose ml-1 my-1 hover:bg-gray-200">Setting</a>
                                    <a href="/messages" class="block text-default py-2 px-4 no-underline hover:underline
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

                <section id="content-div" class="bg-gray-200 h-full pb-20">



                        <section id="breadcrumb" class="ml-4 pt-2">
                            <span class="italic text-sm">Home / map </span>
                        </section>
                        {{-- //lg untuk laptop 1278 x XXX
                        //xl tuk desktop 1440 x 737 --}}
                        <div class="container ml-24 mt-12">

                            <map-component v-bind:user="{{ Auth::User()->id}}"></map-component>
                        </div>

                </section>
            </section>


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.6.5/ol.js"></script>
    <script src="https://unpkg.com/ol-popup@4.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/ol-geocoder"></script>
</body>
</html>



