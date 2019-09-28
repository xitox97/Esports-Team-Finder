@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
        <span class="italic text-sm">Home / <a href="{{url('/players/' . Auth::user()->accounts->dota_id . '/achievements')}}" class="no-underline hover:underline text-blue-500">Achievements</a></span>
   </section>

<div class="container mx-auto mt-16">
        <div class="flex">
<div class="w-5/6 ml-16">
        <div class="bg-white shadow-lg text-center rounded p-4">
                <p class="text-xl  ml-4 font-bold underline pb-2 uppercase">past achievements</p>
            <table class="border-collapse w-full ">
                <thead>
                    <th class="uppercase border-b border-gray-400 py-4 ">#</th>
                    <th class="uppercase border-b border-gray-400 py-4 ">Tournament Name</th>
                    <th class="uppercase border-b border-gray-400 py-4 ">Team</th>
                    <th class="uppercase border-b border-gray-400 py-4 ">Place</th>
                    <th class="uppercase border-b border-gray-400 py-4 ">Date</th>
                </thead>
                <tbody class="text-center">
                    @forelse($users->achievements as $achievement)
                    <tr class="hover:bg-gray-200">
                        <td class="py-4 px-6 border-b border-gray-300">{{$loop->index + 1}}</td>
                        <td class="py-4 px-6 border-b border-gray-300">{{$achievement->tournament_name}}</td>
                        <td class="py-4 px-6 border-b border-gray-300">{{$achievement->team}}</td>
                        <td class="py-4 px-6 border-b border-gray-300">
                            @if($achievement->place == 1)
                            Champion
                            @elseif($achievement->place == 2)
                            Top 4
                            @elseif($achievement->place == 3)
                            Top 8
                            @elseif($achievement->place == 4)
                            Top 18
                            @elseif($achievement->place == 5)
                            Others
                            @endif
                        </td>
                        <td class="py-4 px-6 border-b border-gray-300">{{$achievement->date}}</td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 px-6 border-b border-gray-300 text-center"> <b> No Pasts Achiements</b> </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if(Auth::user()->accounts->dota_id == $users->accounts->dota_id)
    <div class="w-1/6 ml-24 mt-2">
        <a href="/players/{{$users->accounts->dota_id}}/achievements/create" class="bg-transparent hover:bg-indigo-700 text-indigo-800
                            font-semibold hover:text-white py-2 px-4 border border-indigo-800
                            hover:border-transparent rounded shadow-md text-lg">New Achievement</a>
    </div>
    @endif
@endsection
</div>
</div>
