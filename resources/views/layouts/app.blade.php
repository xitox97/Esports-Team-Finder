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


<style>
    .bg-trans{
        background: rgba(0, 0, 0, 0.6);
    }
.fadedrop-enter-active, .fadedrop-leave-active {
  transition: opacity .2s;
  opacity: 0;
}
.fadedrop-enter, .fadedrop-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
  transition: opacity .3s;
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
    <div id="app" class="flex min-h-screen font-sans">
            <sidebar-component v-bind:is-open="isOpen" class="flex flex-col w-2/12 bg-sidebar">
                <a href="/{{$playerUrl}}/stats"
                class="mt-12 mb-10 text-lg font-semibold text-purple-400 hover:text-white"
              >
                <i class="material-icons align-middle {{Request::is($playerUrl . '/stats', $playerUrl . '/heroes', '/stats', $playerUrl . '/totals',  'matches/*') ? 'text-white' : ''}}">assessment</i>
                <span class="align-middle ml-2 {{Request::is($playerUrl . '/stats', $playerUrl . '/heroes', '/stats', $playerUrl . '/totals',  'matches/*') ? 'text-white' : ''}}">Overview</span>
              </a>
              <a
              href="/{{$playerUrl}}/achievements"
                class="mb-10 text-lg font-semibold text-purple-400 cursor-pointer hover:text-white"
              >
                <i class="material-icons align-middle {{Request::is($playerUrl . '/achievements', $playerUrl . '/achievements/*') ? 'text-white' : ''}}">emoji_events</i>
                <span class="align-middle ml-2 {{Request::is($playerUrl . '/achievements', $playerUrl . '/achievements/*') ? 'text-white' : ''}}">Achievements</span>
              </a>
              <a
                href="/tournaments"
                class="mb-10 text-lg font-semibold text-purple-400 hover:text-white"
              >
                <i class="material-icons align-middle {{Request::is('tournaments') ? 'text-white' : ''}}" >videogame_asset</i>
                <span class="align-middle ml-2 {{Request::is('tournaments') ? 'text-white' : ''}}" >Tournaments</span>
              </a>
              <a
                href="{{ url('/teams') }}"
                class="mb-10 text-lg font-semibold text-purple-400 hover:text-white"
              >
                <i class="material-icons align-middle {{Request::is('teams') ? 'text-white' : ''}}" >group</i>
                <span class="align-middle ml-2 {{Request::is('teams') ? 'text-white' : ''}}" >Teams</span>
              </a>
              <a href="/scrims" class="mb-10 text-lg font-semibold text-purple-400 hover:text-white">
                <i class="material-icons align-middle {{Request::is('scrims', 'scrims-schedule') ? 'text-white' : ''}}">sports_kabaddi</i>
                <span class="align-middle ml-2 {{Request::is('scrims', 'scrims-schedule') ? 'text-white' : ''}}" >Scrims</span>
              </a>
              <a href="/players/list" class="mb-10 text-lg font-semibold text-purple-400 hover:text-white">
                <i class="material-icons align-middle {{Request::is('players/list') ? 'text-white' : ''}}">face</i>
                <span class="align-middle ml-2 {{Request::is('players/list') ? 'text-white' : ''}}" >Players</span>
              </a>
              <a href="/players/recommendation" class="mb-10 text-lg font-semibold text-purple-400 hover:text-white">
                <i class="material-icons align-middle {{Request::is('players/recommendation') ? 'text-white' : ''}}">assignment</i>
                <span class="align-middle ml-2 {{Request::is('players/recommendation') ? 'text-white' : ''}}" >Recommendation</span>
              </a>
              <a href="/livestream" class="mb-10 text-lg font-semibold text-purple-400 hover:text-white">
                <i class="material-icons align-middle {{Request::is('livestream') ? 'text-white' : ''}}">ondemand_video</i>
                <span class="align-middle ml-2 {{Request::is('livestream') ? 'text-white' : ''}}" >Live Stream</span>
              </a>
              <a href="/map/search" class="mb-10 text-lg font-semibold text-purple-400 hover:text-white">
                <i class="material-icons align-middle {{Request::is('/map/search') ? 'text-white' : ''}}">near_me</i>
                <span class="align-middle ml-2 {{Request::is('/map/search') ? 'text-white' : ''}}" >Find nearby</span>
              </a>

            </sidebar-component>
            <section id="maindiv" class="flex flex-col w-10/12 bg-gray-900" v-bind:class=" { 'w-10/12': isOpen, 'w-screen': !isOpen }">
                <header class="flex justify-between h-24">
                    <div class="flex items-center w-8 ml-12">
                           <i v-on:click="toggle"  class="text-white cursor-pointer material-icons md-36">
                                    menu_open
                                    </i>
                    </div>
                    <div class="flex items-center justify-around mr-12">
                        {{-- <h1 class="m-auto font-sans text-2xl ">Dream Team</h1> --}}
                        <div class="mx-3">
                            @if (count(Auth::user()->unreadNotifications))
                                <div class="mr-3 cursor-pointer" v-click-outside="hideNoti" @click="noti" v-bind:kira="{{count(Auth::user()->unreadNotifications)}}">
                                  <i class="mt-1 text-yellow-500 material-icons md-36">notifications_active</i>
                                  <span class="absolute px-1 -mt-2 -ml-2 text-sm text-white bg-red-500 rounded-full">
                                    <p v-text="count"></p>
                                  </span>
                                </div>
                                <div v-show="notification" id="dropdowns" class="absolute right-0 z-10 w-auto mt-3 text-center bg-white border rounded shadow" style="display: none;">

                              @foreach(Auth::user()->unreadNotifications as $noti)
                                  @include('notifications.' . snake_case(class_basename($noti->type)))
                              @endforeach

                                <noti-component v-bind:realnoti="true"></noti-component>
                                  <a href="/notifications" class="block px-4 py-2 my-1 ml-1 font-bold leading-loose no-underline hover:bg-gray-200 text-default text-md">See All Notifications</a>
                                </div>
                            @else
                                <div class="mr-3 cursor-pointer" v-click-outside="hideNoti" @click="noti" v-if="bell == false">
                                        <i class="mt-1 text-yellow-500 material-icons md-36">notifications
                                        </i>
                                <span class="absolute px-1 -mt-2 -ml-2 text-sm text-white bg-red-500 rounded-full">
                                    <p v-text="count"></p></span>
                                </div>
                                <div class="mr-3 cursor-pointer" v-click-outside="hideNoti" @click="noti" v-if="bell == true">
                                        <i
                                        class="mt-1 text-yellow-500 material-icons md-36">
                                        notifications_active
                                        </i>
                                    <span class="absolute px-1 -mt-2 -ml-2 text-sm text-white bg-red-500 rounded-full">
                                        <p v-text="count"></p></span>
                                </div>
                                <div v-show="notification" id="dropdowns" class="absolute right-0 z-10 w-2/12 mt-3 text-center bg-white rounded shadow" style="display: none;">
                                    <noti-component v-bind:realnoti="bell"></noti-component>
                                    <a href="/notifications" class="block px-4 py-2 my-1 ml-1 font-bold leading-loose no-underline hover:bg-gray-200 text-default text-md">
                                        See All Notifications</a>
                                    </div>
                            @endif
                        </div>

                        <div class="mx-3">
                            @if(Auth::user()->accounts()->exists() == true)
                            <img  class="w-12 h-12 border-2 border-purple-800 rounded-full cursor-pointer" src="{{Auth::user()->accounts->avatar_url}}" alt="">
                            @else
                            <img src="{{asset('img/default.svg')}}" alt="" class="w-12 h-12 border-2 border-purple-800 rounded-full cursor-pointer">
                            @endif
                        </div>
                        <div class="mx-3">
                                <i  v-click-outside="hide" @click="onoff" class="text-white cursor-pointer material-icons md-36" aria-haspopup="true" :aria-expanded="opened">
                                        more_horiz
                                        </i>
                        </div>
                        <div class="mt-16">
                            <transition name="fadedrop">
                            <div v-show="opened" id="dropdown" class="absolute right-0 w-1/12 rounded shadow bg-content" style="display: none;">
                                    <a href="/{{$playerUrl}}" class="block px-4 py-2 my-1 ml-1 leading-loose text-white no-underline text-default hover:underline text-md hover:bg-dark-100">Setting</a>
                                    <a href="/messages" class="block px-4 py-2 my-1 ml-1 leading-loose text-white no-underline text-default hover:underline text-md hover:bg-dark-100">Inbox</a>
                                    <a class="block px-4 py-2 mb-1 ml-1 leading-loose text-white no-underline text-default hover:underline text-md hover:bg-dark-100" href="/logout"
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

                <section id="content-div" class="h-full px-20 pb-20">

                                @yield('content')

                            {{-- @if (count(Auth::user()->unreadNotifications))

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="badge badge-pill badge-primary" style="float:right; margin-bottom:-10px; "> {{count(Auth::user()->unreadNotifications)}} </span> <i class="far fa-bell"></i>
                                </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @foreach(Auth::user()->unreadNotifications as $noti)
                                            @include('notifications.' . snake_case(class_basename($noti->type)))
                                        @endforeach

                                    </div>

                            </li>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="far fa-bell"></i>
                                </a>


                            </li>


                            @endif --}}
                </section>
            </section>


    </div>


</body>
</html>
