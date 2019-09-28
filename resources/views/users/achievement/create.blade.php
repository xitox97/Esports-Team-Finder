@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
        <span class="italic text-sm">Home / <a href="{{url('/players/' . Auth::user()->accounts->dota_id . '/achievements')}}"
            class="no-underline hover:underline text-blue-500">Achievements</a>
        / Create </span>
   </section>

   <div class="container mx-auto mt-16">
        <div class="flex">
        <div class="mx-auto bg-white shadow-xl mt-3 rounded p-6 w-5/12  font-sans">
            <form class="w-full p-3" method="POST" action="/players/{{$id}}/achievements/create" id="achievement">
                @csrf
                <span class="text-lg font-bold uppercase border-b-2 border-gray-200 pb-4 flex justify-center">Adding New Achievement</span>
                <div class="flex flex-wrap -mx-3 mt-10 mb-2">
                <div class="w-full px-3 mb-2">
                    <label class="block uppercase tracking-wide text-gray-700 text-md font-semibold mb-2" for="grid-first-name">
                    Tournament Name
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700
                    border border-gray-200 rounded py-3 px-4 mb-0 leading-tight focus:outline-none
                    focus:bg-white focus:shadow-outline {{$errors->has('tournament_name') ? 'border-red-500' : ''}} "
                    id="tournament_name" type="text" name="tournament_name" value="{{ old('tournament_name')}}">
                    @error('tournament_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3 mb-2">
                        <label class="block uppercase tracking-wide text-gray-700 text-md font-semibold mb-2" for="grid-first-name">
                            Team Name
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700
                        border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none
                        focus:bg-white focus:shadow-outline {{$errors->has('team') ? 'border-red-500' : ''}}"
                        id="team" name="team" type="text" value="{{ old('team')}}">
                        @error('team')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3 mb-2">
                        <label class="block uppercase tracking-wide text-gray-700 text-md font-semibold mb-2" for="grid-first-name">
                            Place
                        </label>
                        <div class="w-full ">
                                <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700
                                        py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500
                                        focus:shadow-outline" id="grid-state" name="place">
                                        <option disabled selected>Select Place</option>
                                        <option value="1">Champion</option>
                                        <option value="2">Top 4</option>
                                        <option value="3">Top 8</option>
                                        <option value="4">Top 18</option>
                                        <option value="5">Other</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700 {{$errors->has('place') ? 'border-red-500' : ''}}">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                    @error('place')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 ">
                            <div class="w-full px-3 mb-2">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-semibold mb-2" for="grid-first-name">
                                Tournament Date
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700
                            border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
                            focus:bg-white focus:shadow-outline {{$errors->has('date') ? 'border-red-500' : ''}}" id="date" type="date" name="date" value="{{ old('date')}}">
                            @error('date')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center items-center">
                                <div>
                                        <a  href="javascript:history.back()"  class="bg-red-600 hover:bg-red-700 text-white font-bold py-2  px-4
                                        rounded mx-auto cursor-pointer ">Cancel</a>
                                    </div>
                            <div>
                                <a href="javascript:;" onclick="document.getElementById('achievement').submit()" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold
                                py-2  px-4 rounded mx-auto ml-2 ">Submit</a>
                            </div>
                        </div>
            </form><div>

                </div></div>
        </div>
   </div>
@endsection

