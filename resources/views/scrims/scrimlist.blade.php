@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2 text-white font-medium tracking-wide">
    <span class="italic text-sm">Home / Scrim Schedule</span>
</section>

<div class="container mx-auto mt-12 font-mono">
        <p class="text-2xl  ml-1 font-bold  pb-4 capitalize text-purple-600">Scrim list</p>
        <div class="bg-dark-100 shadow-lg text-center rounded-lg px-4 pb-6 pt-5  max-w-4xl">
            {{-- <p class="text-xl  ml-4 font-bold underline pb-2 uppercase">past achievements</p> --}}
        <table class="border-collapse w-full table-fixed">
            <thead class="text-white border-b border-gray-600">
                <tr>
                    <th class="capitalize py-4 ">#</th>
                    <th class="capitalize py-4 ">Team</th>
                    <th class="capitalize py-4 ">Date</th>
                    <th class="capitalize py-4 ">Time</th>
                    <th class="capitalize py-4 "></th>
                    {{-- <th class="capitalize py-4 "></th> --}}
                </tr>

            </thead>
            <tbody class="text-center">
            @forelse ($myTeam->scrims as $scrim)
                    <tr class="text-white font-medium border-b border-gray-600">
                        <td class="py-4">{{$loop->index + 1}}</td>
                        <td  class="py-4"> <a href="{{ url('/teams/' . $scrim->id) }}" class="no-underline hover:underline text-blue-500">{{$scrim->name}}</a> </td>
                        <td  class="py-4">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $scrim->pivot->date_time)->format('h:i:s a') }}</td>
                        <td  class="py-4">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $scrim->pivot->date_time)->format('d/m/Y') }}</td>
                        <td class="py-4"> <a href="/teams/{{$scrim->id}}" class="inline-block bg-indigo-500 rounded px-3
                            text-md font-semibold text-white text-center hover:bg-indigo-600 tracking-wide border-2 border-indigo-500">View</a></td>

                        {{-- <td  class="py-4">
                        <a href="{{  url('/scrims/'. $scrim->pivot->id . '/details')  }}" class="bg-pink-500 font-semibold text-white hover:bg-pink-600
                            py-2 px-4 border border-pink-500 hover:border-pink-600 rounded">View Details</a></td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-4 px-6 border-b border-gray-300 text-center text-white"> <b> No Scheduled Scrims</b> </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>





@endsection

