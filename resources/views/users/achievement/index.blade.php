@extends('layouts.app')

@section('content')
<div class="w-full ml-16">
        <div class="bg-white shadow-lg text-center rounded ">
            <table class="border-collapse w-full">
                <thead>
                    <th class="uppercase border-b border-gray-400 py-4 ">#</th>
                    <th class="uppercase border-b border-gray-400 py-4 ">Tournament Name</th>
                    <th class="uppercase border-b border-gray-400 py-4 ">Team</th>
                    <th class="uppercase border-b border-gray-400 py-4 ">Place</th>
                    <th class="uppercase border-b border-gray-400 py-4 ">Date</th>
                </thead>
                <tbody>
                    @forelse($users->achievements as $achievement)
                    <tr class="hover:bg-gray-200">
                        <td class="py-4 px-6 border-b border-gray-300">{{$loop->index + 1}}</td>
                        <td class="py-4 px-6 border-b border-gray-300">{{$achievement->tournament_name}}</td>
                        <td class="py-4 px-6 border-b border-gray-300">{{$achievement->team}}</td>
                        <td class="py-4 px-6 border-b border-gray-300">{{$achievement->place}}</td>
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
    <div class="w-1/3 ml-24 mt-2">
        <a href="/players/{{$users->accounts->dota_id}}/achievements/create" class="bg-transparent hover:bg-indigo-700 text-indigo-800
                            font-semibold hover:text-white py-2 px-4 border border-indigo-800
                            hover:border-transparent rounded shadow-md">New Achievement</a>
    </div>
    @endif
@endsection
