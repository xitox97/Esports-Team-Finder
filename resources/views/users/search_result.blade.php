@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / Player / List</a></span>
</section>
<div class="container mx-auto mt-12">
        <div class="flex">
        <div class="w-5/6 ml-16">
            <p class="text-2xl  ml-1 font-bold  pb-6 capitalize">List of registered player</p>
                <div class="bg-white shadow-lg text-center rounded-lg px-4 pb-6 pt-5">
                    <table class="border-collapse w-full">
                        <thead class="text-gray-600">
                            <th class="capitalize border-b border-gray-300 py-4 ">Name</th>
                            <th class="capitalize border-b border-gray-300 py-4 ">Rank</th>
                            <th class="capitalize border-b border-gray-300 py-4 ">Main Role</th>
                            <th class="capitalize border-b border-gray-300 py-4 ">Tournament</th>
                            <th class="capitalize border-b border-gray-300 py-4 ">Experience</th>
                            <th class="capitalize border-b border-gray-300 py-4 ">Team</th>
                            <th class="capitalize border-b border-gray-300 py-4 "></th>
                        </thead>
                        <tbody class="text-center">
                            @foreach($players as $player)
                            <tr class="hover:bg-gray-200">
                            <td class="py-4 px-6 border-b border-gray-300">
                                @if($player->accounts['avatar_url'] == null)
                                <img src="{{asset('img/default.svg')}}" alt="" class="rounded-full w-24 h-24">
                                @else
                                <img src="{{  $player->accounts['avatar_url']  }}" alt="" class="rounded-full w-24 h-24">
                                @endif
                                {{$player->accounts['steam_name']}}</td>
                            <td class="py-4 px-6 border-b border-gray-300">@include('users.medal2')</td>
                            <td class="py-4 px-6 border-b border-gray-300">Mid</td>
                            <td class="py-4 px-6 border-b border-gray-300">
                            @foreach($player->tournaments as $tour)
                                <p>{{$tour->name}}</p>
                            @endforeach
                            </td>
                            <td class="py-4 px-6 border-b border-gray-300">Yes*</td>
                            <td class="py-4 px-6 border-b border-gray-300">Team Liquid*</td>
                            <td class="py-4 px-6 border-b border-gray-300"><a href="/players/{{$player->accounts['dota_id']}}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">View</a></td>
                        </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <div class="mt-4 -mb-1">


                    </div>
                </div>

            </div>


        </div>
        </div>
@endsection
{{-- <div class="container">
        <div class="row justify-content-center">
    @foreach ($players as $player)


<div class="col-5">
    <div class="card text-center" >
            <div class="card-body">
                    <img src="{{  $player->accounts['avatar_url']  }}" class="rounded-circle mb-3" alt="...">
                    <h5 class="card-title text-center"> {{   $player->accounts['steam_name']  }}</h5>
                    @include('users.medal2')
                <p class="card-text"></p>
            </div>
            <a href="{{ url('/players/' . $player->accounts['dota_id']) }}" class="btn btn-primary" role="button" >View</a>
          </div>
        </div>
    @endforeach
</div>
</div> --}}

