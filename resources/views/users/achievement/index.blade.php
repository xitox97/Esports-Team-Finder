@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2 text-white font-medium tracking-wide">
        <span class="italic text-sm ">Home / <a href="{{url('/players/' . Auth::user()->accounts->dota_id . '/achievements')}}" class="no-underline hover:underline text-blue-500">Achievements</a></span>
   </section>

<div class="container mx-auto mt-12 font-mono">
<div class="flex">
<div class="w-5/6 ml-16">
    <p class="text-2xl  ml-1 font-bold  pb-4 capitalize text-purple-600">past achievements</p>
        <div class="bg-dark-100 shadow-lg text-center rounded-lg px-4 pb-6 pt-5">
                {{-- <p class="text-xl  ml-4 font-bold underline pb-2 uppercase">past achievements</p> --}}
            <table class="border-collapse w-full">
                <thead class="text-white">
                    <th class="capitalize border-b border-gray-300 py-4 ">#</th>
                    <th class="capitalize border-b border-gray-300 py-4 ">Tournament Name</th>
                    <th class="capitalize border-b border-gray-300 py-4 ">Team</th>
                    <th class="capitalize border-b border-gray-300 py-4 ">Place</th>
                    <th class="capitalize border-b border-gray-300 py-4 ">Date</th>
                    <th class="capitalize border-b border-gray-300 py-4 "></th>
                </thead>
                <tbody class="text-center">
                    @forelse($achievements as $achievement)
                    <tr class="hover:bg-content text-white">
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
                        <td class="py-4 px-6 border-b border-gray-300">
                            <i class="material-icons text-indigo-600 cursor-pointer">
                            create
                            </i>
                            <i class="material-icons text-red-600 cursor-pointer">
                                delete_forever
                                </i></td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 px-6 border-b border-gray-300 text-center text-white"> <b> No Pasts Achiements</b> </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
            <div class="mt-4 -mb-1 p-2">
                {{ $achievements->links() }}

            </div>
        </div>

    </div>
    @if(Auth::user()->accounts->dota_id == $users->accounts->dota_id)
    <div class="w-1/6 ml-20 mt-16">
        <a href="/players/{{$users->accounts->dota_id}}/achievements/create" class="btn-indigo
                            font-semibold py-2 px-2 border border-indigo-800 hover:border-transparent rounded-lg shadow-md text-md
                            flex items-center leading-loose whitespace-no-wrap"><i class="material-icons mr-1">
                                add</i>New Achievement</a>
    </div>
    @endif

</div>
</div>
@endsection
