@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / Team / {{$myTeam->name}}</span>
</section>
<div class="container ml-20 mt-12">
    <div class="flex flex-wrap">
        <div class="w-2/5">
            <div class="flex flex-col bg-white shadow-lg rounded-lg mr-4">
                <div class="w-full px-10 bg-purple-500 ">
                        <p class="text-white font-semibold text-2xl capitalize text-center">Team {{$myTeam->name}}</p>
                </div>
                <div class="flex justify-center">
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
                    <div class="border-b-2 border-purple-500 mx-4 py-2">
                            <p class="text-black font-semibold text-2xl text-left">Player Roster</p>
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
                                        <td class="py-4 px-6 border-b border-gray-300"><a href="{{ url('/players/' . $teamMember->accounts->dota_id) }}"><i class="material-icons text-indigo-600 cursor-pointer md-48">
                                                pageview
                                                </i></a></td>
                                        </tr>
                                        @endforeach

                                        </tbody>

                                    </table>
                        </div>
            </div>
        </div>


    </div>
</div>
@endsection
