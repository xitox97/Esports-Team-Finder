@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2 text-white font-medium tracking-wide">
    <span class="italic text-sm">Home / <a href="{{url('/players/' . $fetchPlayers->dota_id)}}"
        class="no-underline hover:underline text-blue-500">Profile</a> / {{$fetchPlayers->user->name}}</span>
</section>
{{-- //lg untuk laptop 1278 x XXX
//xl tuk desktop 1440 x 737 --}}
<div class="container mt-12 font-mono">
    <div class="flex xl:flex-row lg:flex-col">
    {{-- edit card --}}
    @if( Auth::user()->id == $fetchPlayers->user_id )
    <div class="w-5/12 bg-dark-100 rounded-lg shadow-xl mb-16 p-4">
        <p class="text-white font-semibold text-xl uppercase border-b border-gray-600 pb-6 px-5 pt-3">edit profile</p>
    <form class="w-full max-w-lg p-4 ml-2 mb-2" method="POST" action="/users/{{$fetchPlayers->user_id }}">
      @csrf
      @method('PATCH')
                <div class="flex flex-wrap -mx-3 mb-6">
                  <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-first-name">
                      Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700  border border-gray-200
                    rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-indigo-700 capitalize"
                    id="grid-first-name" type="text" placeholder="{{$fetchPlayers->user->name}}" name="name">
                    @error('name')
                    <p class="text-red-500 text-md italic">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-last-name">
                      Age
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded
                    py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-indigo-700" id="grid-last-name"
                    type="text" placeholder="{{$fetchPlayers->user->age}}" name="age">
                    @error('age')
                    <p class="text-red-500 text-md italic">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                  <div class="w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-city">
                      City
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded
                    py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-indigo-700" id="grid-city"
                    type="text" placeholder="{{$fetchPlayers->user->area}}" name="city">
                    @error('city')
                    <p class="text-red-500 text-md italic">{{ $message }}</p>
                    @enderror
                  </div>
                  <div class="w-2/3 px-3 mb-6 ">
                    <label class="block uppercase tracking-wide text-white text-xs font-bold mb-2" for="grid-state">
                      State
                    </label>
                    <div class="relative">
                      <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4
                      pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-indigo-700" id="grid-state"
                      name="state" required>
                      <option value="" selected disabled hidden>{{$fetchPlayers->user->state}}</option>
                      <option value="Johor">Johor</option>
                      <option value="Kedah">Kedah</option>
                      <option value="Kelantan">Kelantan</option>
                      <option value="Melaka">Melaka</option>
                      <option value="Negeri Sembilan">Negeri Sembilan</option>
                      <option value="Pahang">Pahang</option>
                      <option value="Penang">Penang</option>
                      <option value="Perak">Perak</option>
                      <option value="Perlis">Perlis</option>
                      <option value="Sabah">Sabah</option>
                      <option value="Sarawak">Sarawak</option>
                      <option value="Selangor">Selangor</option>
                      <option value="Terengganu">Terengganu</option>
                      <option value="Kuala Lumpur">Kuala Lumpur</option>
                      <option value="Labuan">Labuan</option>
                      <option value="Putrajaya">Putrajaya</option>
                      </select>
                      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                      </div>
                    </div>
                    @error('state')
                    <p class="text-red-500 text-md italic">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="flex justify-center items-center">
                <button type="submit" class="btn-indigo font-bold py-2 px-4 rounded">
                        Save
                      </button>
                </div>
              </form>

              <div class="border-t border-gray-600 mx-3">
              <form class="w-full max-w-lg pl-3 pr-5 pt-4 ml-1" method="POST" action="{{ route('change.password') }}">
                @csrf
                <div class="flex flex-wrap -mx-3  mb-2">
                            <div class="w-full px-3 mb-2">
                                <label class="block capitalize tracking-wide text-white text-md font-semibold mb-2" for="grid-password">
                                current password
                                </label>
                                <input class="appearance-none block w-full bg-gray-200 text-gray-700
                                border border-gray-200 rounded py-3 px-4 mb-0 leading-tight focus:outline-none
                                focus:bg-white focus:shadow-outline {{$errors->has('password') ? 'border-red-500' : ''}} "
                                id="password" type="password" name="current_password">
                                @error('current_password')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full px-3 mb-2">
                                    <label class="block capitalize tracking-wide text-white text-md font-semibold mb-2" for="grid-password">
                                    new password
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700
                                    border border-gray-200 rounded py-3 px-4 mb-0 leading-tight focus:outline-none
                                    focus:bg-white focus:shadow-outline {{$errors->has('password') ? 'border-red-500' : ''}} "
                                    id="password1" type="password" name="new_password" >
                                    @error('new_password')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-2">
                                        <div class="w-full px-3 mb-2">
                                            <label class="block capitalize tracking-wide text-white text-md font-semibold mb-2" for="grid-password">
                                            confirm new password
                                            </label>
                                            <input class="appearance-none block w-full bg-gray-200 text-gray-700
                                            border border-gray-200 rounded py-3 px-4 mb-0 leading-tight focus:outline-none
                                            focus:bg-white focus:shadow-outline {{$errors->has('password') ? 'border-red-500' : ''}} "
                                            id="password2" type="password" name="new_confirm_password" value="{{ old('password')}}">
                                            @error('new_confirm_password')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        </div>
                    <div class="flex justify-center items-center">
                    <button type="submit" class="btn-indigo font-bold py-2 px-4 rounded">
                            Change Password
                          </button>
                    </div>
                  </form></div>

            </div>

            {{-- user card --}}
            <div class="-mr-24 bg-dark-100 mb-40 ml-20 rounded-lg shadow-xl w-5/12 ml-32 mt-20">
                @if ( Auth::user()->id == $fetchPlayers->user_id )
                <div class="flex justify-center mx-10 ">
                    <img src="{{  $fetchPlayers->avatar_url  }}" class="-mt-24 relative rounded-full w-48 shadow-lg border-2">
                </div>
                @elseif( Auth::user()->id != $fetchPlayers->user_id )
                <div class="flex justify-between mx-10 ">
                        <a href="{{  $fetchPlayers->profile_url  }}" class="bg-purple-500 hover:bg-purple-400 font-semibold  mb-16 mt-6 px-4 py-2 rounded-lg text-white text-sm shadow-lg">Add Friend </a>
                        @if($fetchPlayers->avatar_url == null)
                        <img src="{{asset('img/default.svg')}}" alt="" class="-mt-16 relative rounded-full w-48 shadow-lg">
                        @else
                        <img src="{{  $fetchPlayers->avatar_url  }}" alt="" class="-mt-16 relative rounded-full w-48 shadow-lg">
                        @endif
                        <a href="/offer/{{ $fetchPlayers->user_id }}" class="bg-indigo-500 hover:bg-indigo-400 font-bold  mb-16 mt-6 px-4 py-2 rounded-lg text-white text-sm shadow-lg">Invite Team</a>
                    </div>
                @endif
                <div class="flex flex-col items-center border-b-2 pb-6">
                        <p class="text-2xl font-semibold leading-loose text-white capitalize">{{$fetchPlayers->user->name}}, {{$fetchPlayers->user->age}}</p>
                        <p class="text-md font-medium leading-loose text-white capitalize -mt-2">{{$fetchPlayers->user->area}}, {{$fetchPlayers->user->state}}</p>

                        <p class="text-md font-medium leading-loose text-white capitalize -mt-2">Current Team:
                            @if($fetchPlayers->user->team()->exists() != false)
                            <a class="no-underline hover:underline text-blue-500"
                            href="/teams/{{$fetchPlayers->user->team[0]->id}}">
                            {{$fetchPlayers->user->team[0]->name}}</a>
                            @else
                                None
                            @endif
                        </p>

                </div>
                <div class="flex flex-col items-center mt-4 pb-5">
                        <p class="text-lg font-semibold  text-white capitalize ">Winrate: {{  round(($fetchPlayers->win_lose['win'] / ($fetchPlayers->win_lose['win'] +
                                $fetchPlayers->win_lose['lose'])) * 100, 2)  }} %</p>
                        <p class="text-lg font-semibold  text-white capitalize">Total Games: {{  $fetchPlayers->win_lose['win'] + $fetchPlayers->win_lose['lose']  }} (Win: {{$fetchPlayers->win_lose['win']}}
                        Lose: {{$fetchPlayers->win_lose['lose']}})</p>
                        <p class="text-lg font-semibold  text-white capitalize">Main Roles: *reserve</p>
                        <div class="mt-4">
                                @include('users.medal')
                        </div>
                        <a  href="{{ url('/players/' . $fetchPlayers->dota_id) }}/stats" class="bg-pink-500 hover:bg-pink-400 text-white text-lg font-bold py-2 px-4 rounded-lg shadow-lg mt-5">
                                View Statistic
                        </a>

                </div>
            </div>
    </div>
  </div>
    @else
    <!-- if visit others profile !-->
    <div class="container mx-auto w-full">
    <div class=" bg-dark-100  rounded-lg shadow-xl mb-32 mx-64 pb-10 px-10">
        @if ( Auth::user()->id == $fetchPlayers->user_id )
        <div class="flex justify-center mx-10 ">
            <img src="{{  $fetchPlayers->avatar_url  }}" alt="" class="-mt-24 relative rounded-full w-48 shadow-lg border-2 flex-shrink-0">
        </div>
        @elseif( Auth::user()->id != $fetchPlayers->user_id )
        <div class="flex justify-between items-center">
            <div class="">
                <a href="{{  $fetchPlayers->profile_url  }}" class="bg-purple-500 flex-shrink-0 hover:bg-purple-400 font-semibold
                         px-4 py-2 rounded-lg text-white text-sm shadow-lg">Add Friend </a>
            </div>
            <div class="">
                @if($fetchPlayers->avatar_url == null)
                <img src="{{asset('img/default.svg')}}" alt="" class="-mt-24 relative rounded-full w-48 shadow-lg border-2 flex-shrink-0">
                @else
                <img src="{{  $fetchPlayers->avatar_url  }}" alt="" class="-mt-24 relative rounded-full w-48 shadow-lg flex-shrink-0 border-2">
                @endif
            </div>
            <div class="">
                <a href="/offer/{{ $fetchPlayers->user_id }}" class="bg-indigo-500 flex-shrink-0 hover:bg-indigo-400 font-bold  px-4 py-2 rounded-lg text-white text-sm shadow-lg">Invite Team</a>
            </div>
            </div>
        @endif
        <div class="flex flex-col items-center border-b-2 pb-6">
                <p class="text-2xl font-semibold leading-loose text-white capitalize">{{$fetchPlayers->user->name}}, {{$fetchPlayers->user->age}}</p>
                <p class="text-md font-medium leading-loose text-white capitalize -mt-2">{{$fetchPlayers->user->area}}, {{$fetchPlayers->user->state}}</p>
                <p class="text-md font-medium leading-loose text-white capitalize -mt-2">Current Team:
                        @if($fetchPlayers->user->team()->exists() != false)
                        <a class="no-underline hover:underline text-blue-500"
                        href="/teams/{{$fetchPlayers->user->team[0]->id}}">
                        {{$fetchPlayers->user->team[0]->name}}</a>
                        @else
                            None
                        @endif
                    </p>
        </div>
        <div class="flex flex-col items-center mt-4">
                <p class="text-lg font-semibold  text-white capitalize ">Winrate: {{  round(($fetchPlayers->win_lose['win'] / ($fetchPlayers->win_lose['win'] +
                        $fetchPlayers->win_lose['lose'])) * 100, 2)  }} %</p>
                <p class="text-lg font-semibold  text-white capitalize">Total Games: {{  $fetchPlayers->win_lose['win'] + $fetchPlayers->win_lose['lose']  }} (Win: {{$fetchPlayers->win_lose['win']}}
                Lose: {{$fetchPlayers->win_lose['lose']}})</p>
                <p class="text-lg font-semibold  text-white capitalize">Main Roles: *reserve</p>
                <a href="#" class="text-lg font-semibold  text-white capitalize text-indigo-500 hover:underline"
                @click.prevent="$modal.show('achievement' ,{ id: {{$fetchPlayers->dota_id}} })">View Latest Achievements</a>
                <div class="mt-4">
                        @include('users.medal')
                </div>
                <a  href="{{ url('/players/' . $fetchPlayers->dota_id) }}/stats" class="bg-pink-500 hover:bg-pink-400 text-white text-lg
                    font-bold py-2 px-4 rounded-lg shadow-lg mt-10">
                        View Statistic
                </a>
                <a  @click.prevent="$modal.show('hello-world', {user: [    { id: {{$user->id}} },
                { name: '{{$user->name}}' } ]})" href="/messages/create/{{$fetchPlayers->user_id}}"
                class="border-pink-500 border-2 bg-transparent hover:bg-pink-400 text-white text-lg font-bold py-2 px-4 rounded-lg shadow-lg mt-10">
                    Send Message
            </a>
                </div>
            </div>
        @if (session('offer'))
            <div v-show="alert" class="-mt-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" v-on:click="hideAlert" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('offer') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif
        @if (session('pass'))
            <div v-show="alert" class="-mt-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" v-on:click="hideAlert" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('pass') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif
        @if (session('team'))
            <div v-show="alert" class="-mt-8 bg-orange-100 border border-orange-400 text-orange-700 px-4 py-3 rounded relative" v-on:click="hideAlert" role="alert">
                <strong class="font-bold">Hold up!</strong>
                <span class="block sm:inline">{{ session('team') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-orange-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif
        @if (session('captain'))
            <div v-show="alert" class="-mt-8 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-on:click="hideAlert" role="alert">
                <strong class="font-bold">Ops!</strong>
                <span class="block sm:inline">{{ session('captain') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif
        @if (session('full'))
            <div v-show="alert" class="-mt-8 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-on:click="hideAlert" role="alert">
                <strong class="font-bold">Ops!</strong>
                <span class="block sm:inline">{{ session('full') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
        @endif


        <message-component></message-component>
        <achievement-component></achievement-component>
        </div>

        @endif
@endsection


