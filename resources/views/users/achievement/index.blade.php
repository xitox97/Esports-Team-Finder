@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="pt-2 ml-4 font-medium tracking-wide text-white">
        <span class="text-sm italic ">Home / <a href="{{url('/players/' . $users->accounts->dota_id)}}"
            class="text-blue-500 no-underline hover:underline">Profile</a> / {{$users->name}} / <a href="{{url('/players/' . $users->accounts->dota_id . '/achievements')}}"
            class="text-blue-500 no-underline hover:underline">Achievements</a></span>
   </section>

<div class="container mt-12 font-mono">
<div class="flex flex-wrap">
<div class="ml-16 min-w-md">
    <p class="ml-1 text-2xl font-bold text-purple-600 uppercase">past achievements</p>
    <p class="pb-4 ml-1 text-md font-normal text-gray-600 italic">Record your past achievement here</p>
    @if($achievements->total() != 0)
        <div class="px-4 pt-5 pb-6 text-center rounded-lg shadow-lg bg-dark-100">
                {{-- <p class="pb-2 ml-4 text-xl font-bold underline uppercase">past achievements</p> --}}
            <table class="w-full border-collapse">
                <thead class="text-white">
                    <th class="py-4 capitalize border-b border-gray-600 ">#</th>
                    <th class="py-4 capitalize border-b border-gray-600 ">Tournament Name</th>
                    <th class="py-4 capitalize border-b border-gray-600 ">Team</th>
                    <th class="py-4 capitalize border-b border-gray-600 ">Place</th>
                    <th class="py-4 capitalize border-b border-gray-600 ">Date</th>
                    <th class="py-4 capitalize border-b border-gray-600 "></th>
                </thead>
                <tbody class="text-center">
                    
                        @foreach($achievements as $achievement)
                        <tr class="text-white hover:bg-content">
                            <td class="px-6 py-4 border-b border-gray-600">{{$loop->index + 1}}</td>
                            <td class="px-6 py-4 border-b border-gray-600 capitalize">{{$achievement->tournament_name}}</td>
                            <td class="px-6 py-4 border-b border-gray-600 capitalize">{{$achievement->team}}</td>
                            <td class="px-6 py-4 border-b border-gray-600">
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
                            <td class="px-6 py-4 border-b border-gray-600">{{$achievement->date}}</td>
                            @if(Auth::user()->accounts->dota_id == $users->accounts->dota_id)
                            <td class="px-6 py-4 border-b border-gray-600">
                                <div class="flex">
                                        <a href="#" @click.prevent="$modal.show('edit-achievement',{ achievement: {{$achievement}} })">
                                                <span v-tooltip.top="'Edit this achievement'">
                                            <i class="text-indigo-600 cursor-pointer material-icons">
                                                create
                                                </i> </span></a>

                                                <form action="/players/{{$users->accounts->dota_id}}/achievements/{{$achievement->id}}" method="post">
                                                @csrf
                                                @method("delete")
                                                    <button type="submit">  <span v-tooltip.top="'Delete this achievement'"><i class="text-red-600 cursor-pointer material-icons">
                                                            delete_forever
                                                            </i></span></button>
                                                </form>
                                </div>

                                </td>

                                    @endif
                        </tr>
                        @endforeach
                </tbody>
                @else
                <a href="/players/{{$users->accounts->dota_id}}/achievements/create" class="flex w-8/12 items-center px-2 py-2 font-semibold leading-loose whitespace-no-wrap border border-indigo-800 rounded-lg shadow-md btn-indigo hover:border-transparent text-md"><i class="mr-1 material-icons">
                    add</i>New Achievement</a>
                @endif
                <edit-achievement></edit-achievement>

            </table>
            <div class="p-2 mt-4 -mb-1">
                {{ $achievements->links() }}

            </div>
        </div>

    </div>
    @if(Auth::user()->accounts->dota_id == $users->accounts->dota_id)
        @if($achievements->total() != 0)
        <div class="mt-16 ml-20">
            <a href="/players/{{$users->accounts->dota_id}}/achievements/create" class="flex items-center px-2 py-2 font-semibold leading-loose whitespace-no-wrap border border-indigo-800 rounded-lg shadow-md btn-indigo hover:border-transparent text-md"><i class="mr-1 material-icons">
                                    add</i>New Achievement</a>
        </div>
        @endif
    @endif

</div>
</div>
@endsection
