@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / Tournaments / <a href="tournaments" class="no-underline hover:underline text-blue-500">View</a></span>
    </section>

    <div class="container ml-12 mt-12 pr-4">
            @if (session('interest'))
            <div v-show="alert" class="-mt-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" v-on:click="hideAlert" role="alert">
                <strong class="font-bold">Successfully!</strong>
                <span class="block sm:inline">{{ session('interest') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
            </div>
            @elseif(session('notInterest'))
            <div v-show="alert" class="-mt-8 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-on:click="hideAlert" role="alert">
                    <strong class="font-bold">Successfully!</strong>
                    <span class="block sm:inline">{{ session('notInterest') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            @endif
        <div class="flex flex-wrap flex-row justify-center">
            @foreach ($tournament as $tour)
                <div class="max-w-xs rounded overflow-hidden shadow-lg mx-2 mb-2 mt-2  bg-white  hover:bg-gray-100 ">
                    <div>
                            <img class="max-h-1/4 object-scale-down w-full" src="{{  asset('storage/tour/' . $tour->image) }}" alt="">

                    </div>
                    <div class="px-6 py-4 text-center">
                        <div class="font-bold text-xl">{{ $tour->name }}</div>
                        <p class="font-medium text-md mb-2">Prize Pool: RM {{ $tour->prizepool }}</p>
                        <p class="text-gray-700 text-base"><span class="font-medium capitalize">Organizer:</span> {{ $tour->organizer }}</p>
                        <p class="text-gray-700 text-base"><span class="font-medium capitalize">Date:</span> {{ $tour->start_date }} until {{ $tour->end_date }}</p>
                        <p class="text-gray-700 text-base"><span class="font-medium capitalize">venue:</span> {{ $tour->venue }}</p>
                        <p class="text-gray-700 text-base"><span class="font-medium capitalize">State:</span> {{ $tour->state }}</p>

                        @if($tour->status == 1)
                        <p class="text-gray-700 text-base"><span class="font-medium capitalize">Status:</span> Ended</p>
                        @else
                        <p class="text-gray-700 text-base"><span class="font-medium capitalize">Status:</span> Upcoming</p>
                        @endif
                    </div>
                        @php
                            $check = false;
                            foreach ($tour->users as $user) {
                                if($user->id == Auth::user()->id)
                                {
                                    $check = true;
                                    break;
                                }
                            }
                        @endphp
                        <div class="text-center pb-3 -mt-3">

                        @if($check)
                            <a href="/tournaments/notInterested/{{ $tour->id }}" class="inline-block bg-red-500 rounded-full
                                px-3 py-1 text-md font-semibold text-white mt-3 text-center hover:bg-red-600">Cancel</a>
                        @else
                        <a href="/tournaments/interested/{{ $tour->id }}" class="inline-block bg-green-500 rounded-full px-3 py-1
                            text-md font-semibold text-white mt-3 text-center hover:bg-green-600">Interested</a>
                        @endif
                    </div>

                </div>
            @endforeach
            <example-component></example-component>
        </div>

    </div>
@endsection
