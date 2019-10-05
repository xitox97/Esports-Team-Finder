@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / Team / <a href="/teams/{{$myTeam->id}}"
        class="no-underline hover:underline text-blue-500">{{$myTeam->name}}</a></span>
</section>
<div class="container ml-20 mt-12">
    <div class="flex flex-wrap">
        <div class="w-2/5">
            <div class="flex flex-col bg-white shadow-lg rounded-lg mr-4">
                <div class="w-full px-10 bg-purple-500   relative text-center pb-1">
                        <span class="text-white font-semibold text-2xl capitalize text-center">Team {{$myTeam->name}}</span>
                        @if(auth()->user()->id == $myTeam->captain_id)
                        <i class="material-icons cursor-pointer absolute ml-16 mb-1 text-white md-48"  v-click-outside="hides" v-on:click="dropTeam">
                                more_horiz
                                </i>

                            <div v-show="team" id="dropdown" class="absolute rounded shadow right-0  bg-white w-4/12">
                                @if($myTeam->scrim == false)
                                <a href="/teams/scrim/{{ $myTeam->id }}" class="block text-default py-2 px-4 no-underline hover:underline
                                    text-md leading-loose ml-1 my-1 hover:bg-gray-200"
                                role="button" >Ready for scrim</a>
                            @else
                                <a href="/teams/notScrim/{{ $myTeam->id }}" class="block text-default py-2 px-4 no-underline hover:underline
                                    text-md leading-loose ml-1 my-1 hover:bg-gray-200"
                                role="button" >Not Ready for scrim</a>
                            @endif
                                    <a href="/teams/{{$myTeam->id}}/edit" class="block text-default py-2 px-4 no-underline hover:underline
                                        text-md leading-loose ml-1 my-1 hover:bg-gray-200">Edit team profile</a>
                                    <a class="block text-default py-2 px-4 no-underline hover:underline text-md leading-loose ml-1 mb-1 hover:bg-gray-200 cursor-pointer"
                                    onclick="event.preventDefault();
                                                    document.getElementById('delete-form').submit();">
                                        Delete
                                    </a>

                                    <form id="delete-form" action="/teams/{{ $myTeam->id }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}

                                        </form>
                                </div>
                            @endif
                </div>

                <div class="flex justify-center my-2">
                        <img src="{{  asset('storage/pics/' . $myTeam->image) }}" alt="" class=" rounded-sm w-3/5">
                </div>

                <div class="w-full px-10 bg-purple-500">
                        <p class="font-semibold text-xl capitalize text-center text-white ">Team Information</p>
                </div>
                <div class="flex flex-col  items-center mt-2 mx-10 mb-2">
                    <p class="text-center"><span class="font-semibold">City:</span> {{$myTeam->area}}</p>
                    <p class="text-center"><span class="font-semibold">State:</span> Melaka*</p>
                    <p class="text-center"><span class="font-semibold">Captain:</span> {{$myTeam->captain_id}}*</p>
                    <p class="text-center"><span class="font-semibold">Sponsor:</span> Razer* Logitech*</p>
                    <p class="text-center"><span class="font-semibold">Description:</span> Lorem ipsum dolor sit amet,Temporibus minus numquam illum beatae</p>
                </div>
                <div class="w-full px-10 bg-purple-500">
                        <p class="font-semibold text-xl capitalize text-center text-white ">Achievements</p>
                </div>
                <div class="flex flex-col  items-center mt-2 mx-10 mb-2">
                        <p class="text-left"><span class="font-semibold">Kl Major:</span> Top 3</p>
                        <p class="text-left"><span class="font-semibold">Ti 7:</span> top2*</p>
                </div>

            </div>
        </div>
        <div class="w-2/4 rounded-lg">
            <div class="flex flex-col justify-content bg-white shadow-lg ml-4">
                    <div class="bg-purple-500 py-2">
                            <p class="text-white font-semibold text-2xl text-center">Player Roster</p>
                        </div>
                        <div>
                                <table class="border-collapse w-full">
                                        <thead class="text-gray-600">
                                            <th class="capitalize border-b border-gray-300 py-4 text-center">ID</th>
                                            <th class="capitalize border-b border-gray-300 py-4 text-center">Name</th>
                                            <th class="capitalize border-b border-gray-300 py-4 text-center">Position</th>
                                            <th class="capitalize border-b border-gray-300 py-4 text-center">Join Date</th>
                                            <th class="capitalize border-b border-gray-300 py-4 "></th>
                                        </thead>
                                        <tbody class="text-center">
                                        @foreach($teamMembers as $teamMember)

                                        <tr class="hover:bg-gray-200">
                                        <td class="py-4 px-6 border-b border-gray-300">{{$teamMember->accounts->steam_name}}</td>
                                        <td class="py-4 px-6 border-b border-gray-300 capitalize">{{$teamMember->name}}</td>
                                        <td class="py-4 px-6 border-b border-gray-300">Mid*</td>
                                        @foreach($teamMember->team as $t)
                                        <td class="py-4 px-6 border-b border-gray-300">{{$t->pivot->created_at->format('d-m-Y')}}</td>

                                        @endforeach
                                        <td class="py-4 px-6 border-b border-gray-300 flex">
                                            <a href="{{ url('/players/' . $teamMember->accounts->dota_id) }}">
                                                <i class="material-icons text-indigo-600 cursor-pointer md-48 hover:text-indigo-800">
                                                search
                                                </i>
                                            </a>
                                            @if(auth()->user()->id == $teamMember->id)
                                            <a href="/leave/{{ $myTeam->id }}"><i class="material-icons  text-indigo-600 cursor-pointer md-48 hover:text-indigo-800">
                                            exit_to_app
                                            </i>
                                            </a>
                                            @endif
                                            @if(auth()->user()->id == $myTeam->captain_id and auth()->user()->id != $teamMember->id)
                                            <i class="material-icons text-indigo-600 cursor-pointer md-48 hover:text-indigo-800">
                                                    close
                                                    </i>
                                            @endif

                                        </td>
                                        </tr>
                                        @endforeach

                                        </tbody>

                                    </table>

                        </div>

            </div>
            @if (session('leave'))
                <div v-show="alert" class="mt-1 bg-orange-100 border border-orange-400 text-orange-700 px-4 py-3 rounded relative" v-on:click="hideAlert" role="alert">
                        <strong class="font-bold">Hold up!</strong>
                        <span class="block sm:inline">{{ session('leave') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-orange-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
            @endif
        </div>


    </div>
</div>
@endsection
