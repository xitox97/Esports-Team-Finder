@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / Scrims / <a href=""
        class="no-underline hover:underline text-blue-500"></a> Available Team</span>
    </section>

    <div class="container mx-auto w-full mt-4 rounded-lg pt-3 pl-3">
        <div class="flex flex-wrap">

        @foreach ($teams as $team)


                <div class="bg-white w-1/4 flex flex-col m-2 shadow-lg rounded-t-lg">
                    <div class="flex p-4 border-b border-gray-300">
                        <img class="w-24 h-24 rounded-full" src="{{  asset('storage/pics/' . $team->image) }}" alt="">
                        <div class="ml-5">
                            <p class="font-medium text-lg text-indigo-700 ml-1 capitalize">{{$team->name}}</p>
                            <p class="text-md font-medium text-gray-800 ml-1 -mt-1 capitalize">{{$team->area}}</p>
                            <p class="text-sm font-medium text-gray-600 ml-1  capitalize">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center py-3 border-b border-gray-300">
                        <div><p class="text-center font-medium text-orange-500 mb-1">Team Members</p></div>
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
                    <div class="text-center py-4  bg-indigo-700 hover:bg-indigo-800">
                        <a href="/scrims/add/{{$team->id}}" class="text-white font-semibold cursor-pointer">Send Scrim Invite</a>
                    </div>

                </div>
        @endforeach
        </div>
    </div>

@endsection
