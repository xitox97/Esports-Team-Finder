@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2 text-white font-medium tracking-wide">
    <span class="italic text-sm">Home / <a href="/scrims" class="text-blue-500 hover:underline">Scrim</a> /  Available Team</span>
    </section>

    <div class="container mx-auto w-full mt-4 rounded-lg pt-3 pl-3">
        <div class="flex flex-wrap">

        @forelse ($teams as $team)
                <div class="bg-dark-100 w-1/4 flex flex-col m-2 shadow-lg rounded-t-lg">
                    <a href="/teams/{{$team->id}}" class="text-white font-semibold cursor-pointer">
                    <div class="flex p-4 border-b border-gray-600">
                        <img class="w-24 h-24 rounded-full" src="{{  asset('storage/pics/' . $team->image) }}" alt="">
                        <div class="ml-5">

                                <p class="font-semibold ml-1 text-lg tracking-wide uppercase">{{$team->name}}</p>
                            <p class="-mt-1 capitalize font-medium ml-1 text-gray-400 text-md">{{$team->area}}</p>
                            <p class="italic ml-1 text-gray-400 text-sm">{{$team->description}}</p>
                        </div>
                    </div></a>
                    <div class="flex flex-col justify-center py-3 border-b border-gray-600">
                        <div><p class="text-center font-medium text-indigo-400 mb-1">Team Members</p></div>
                        <div class="flex justify-center">
                            @foreach($team->users as $user)
                            {{-- {{dd($user->accounts->avatar_url)}} --}}
                                @if($user->accounts->avatar_url == null)
                                    <img class="w-12 h-12 rounded-full border-2 border-white relative -ml-2" src="{{asset('img/default.svg')}}">
                                @else
                                    <img class="w-12 h-12 rounded-full border-2 border-white relative -ml-2" src="{{$user->accounts->avatar_url}}">
                                @endif
                                {{-- <p>{{$user->name}}</p> --}}
                            @endforeach
                        </div>

                    </div>
                    <div class="text-center py-4  bg-purple-800 hover:bg-indigo-800">
                        <a href="/scrims/add/{{$team->id}}" class="text-white font-semibold cursor-pointer">Send Scrim Invite</a>
                    </div>
                    {{-- <div class="text-center py-4  bg-indigo-700 hover:bg-indigo-800">
                        <a href="/teams/{{$team->id}}" class="text-white font-semibold cursor-pointer">View Details</a>
                    </div> --}}
                </div>
                @empty
                <div class="container ml-20 mt-12 max-w-6xl mr-2">
                    <div class="bg-purple-100 border-t border-b border-purple-500 text-purple-500 px-4 py-3 text-center bg-dark-100" role="alert">
                        <p class="font-bold text-lg">Currently there is no team wanted to scrim</p>
                        <p class="text-md">Please come back later.</p>
                    </div>

                </div>
        @endforelse
        </div>
    </div>

@endsection
