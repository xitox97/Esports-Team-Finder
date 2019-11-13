@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2 text-white font-medium tracking-wide">
        <span class="italic text-sm">Home / Recomendation / Search</a></span>
    </section>
    <div class="container mx-auto mt-12">
            <div class="flex">
                    <div class="mx-auto bg-dark-100 shadow-xl mt-3 rounded p-6 w-5/12  font-sans">
                    <form class="w-full p-3 font-mono" method="POST" action="/players/recommendation" id="achievement">
                        @csrf
                        <span class="text-xl font-bold uppercase border-b-2 border-gray-600 pb-4 flex
                        justify-center text-white tracking-wide">Generate Recommendation</span>
                        <div class="flex flex-wrap -mx-3">
                                <div class="w-full px-3 my-2">
                                <label class="block capitalize tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                    Player Role
                                </label>
                                <div class="w-full ">
                                        <div class="relative">
                                                <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                                py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                                " id="player_role-state" name="player_role">
                                                <option disabled selected>Select Role</option>
                                                <option selected>Select rank</option>
                                                <option value="core">Core</option>
                                                <option value="support">Support</option>
                                            </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                </div>
                                            </div>
                                            @error('player_role')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 ">
                                <div class="w-full px-3 my-2">
                                <label class="block capitalize tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                    Player Position
                                </label>
                                <div class="w-full ">
                                        <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                        py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                        " id="position-state" name="position">
                                        <option disabled selected>Select Position</option>
                                        <option value="carry">Carry</option>
                                        <option value="mid">Mid</option>
                                        <option value="offlaner">Offlaner</option>
                                        <option value="roamer">Roamer</option>
                                        <option value="support">Support</option>
                                    </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                </div>
                                            </div>
                                            @error('position')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 ">
                                <div class="w-full px-3 my-2">
                                <label class="block capitalize tracking-wide text-white text-md font-semibold mb-2" for="rank">
                                    Rank
                                </label>
                                <div class="w-full ">
                                    <div class="relative">
                                    <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                    py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                    " id="rank" name="rank">
                                    <option disabled selected>Select Position</option>
                                    <option value="uncalibrated">Uncalibrated</option>
                                    <option value="herald">Herald</option>
                                    <option value="guardian">Guardian</option>
                                    <option value="crusader">Crusader</option>
                                    <option value="archon">Archon</option>
                                    <option value="legend">legend</option>
                                    <option value="ancient">ancient</option>
                                    <option value="divine">divine</option>
                                    <option value="immortal">immortal</option>
                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                </div>
                                            </div>
                                            @error('rank')
                                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full px-3 my-2">
                                <label class="block capitalize tracking-wide text-white text-md font-semibold mb-2" for="rank">
                                    Experience
                                </label>
                                <div class="w-full ">
                                    <div class="relative">
                                    <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                    py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                    " id="experience" name="experience">
                                    <option disabled selected>Select Experience</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                                @error('experience')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-full px-3 my-2">
                                    <label class="block capitalize tracking-wide text-white text-md font-semibold mb-2" for="rank">
                                        Tournament
                                    </label>
                                    <div class="w-full ">
                                        <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                        py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                        " id="tournament" name="tournament">
                                        <option disabled selected>Select Tournament</option>
                                        @foreach($tours as $tour)
                                        <option value="{{$tour->id}}">{{$tour->name}}</option>
                                    @endforeach
                                  </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2  {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                    @error('tournament')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- advance --}}
                                <p class="border-b border-gray-600 text-lg font-semibold text-gray-400 mb-4"> Advances Search (Optional)</p>
                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-1/2 px-3 mb-2">
                                        <label class="block uppercase tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                        avg Winrate
                                        </label>
                                        <input class="appearance-none bg-gray-400 block border border-gray-200 focus:outline-none focus:shadow-outline focus:bg-gray-200 leading-tight mb-0 px-4 py-3 rounded text-black w-full {{$errors->has('winrate') ? 'border-red-500' : ''}} "
                                        id="winrate" type="text" name="winrate" value="{{ old('winrate')}}">
                                        @error('winrate')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-1/2 px-3 mb-2">
                                            <label class="block uppercase tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                            avg Gold Per Minute
                                            </label>
                                            <div class="w-full ">
                                                    <div class="relative">
                                                    <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                                    py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                                    " id="gpm" name="gpm">
                                                    <option disabled selected>Select GPM</option>
                                                    <option value="0">Any</option>
                                                    <option value="200">200+</option>
                                                    <option value="400">400+</option>
                                                    <option value="600">600+</option>
                                                    <option value="800">800+</option>
                                                </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                    </div>
                                                </div>
                                                @error('gpm')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                                    </div>
                                        </div>
                                </div>
                                <div class="flex flex-wrap -mx-3 mb-2">
                                        <div class="w-1/2 px-3 mb-2">
                                            <label class="block uppercase tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                            avg Xp per minute
                                            </label>
                                            <div class="w-full ">
                                                    <div class="relative">
                                                    <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                                    py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                                    " id="xppm" name="xppm">
                                                    <option disabled selected>Select XPPM</option>
                                                    <option value="0">Any</option>
                                                    <option value="200">200+</option>
                                                    <option value="400">400+</option>
                                                    <option value="600">600+</option>
                                                    <option value="800">800+</option>
                                                </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                    </div>
                                                </div>
                                                @error('xppm')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                                    </div>
                                        </div>
                                        <div class="w-1/2 px-3 mb-2">
                                                <label class="block uppercase tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                                avg last hit
                                                </label>
                                                <div class="w-full ">
                                                        <div class="relative">
                                                        <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                                        py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                                        " id="lasthit" name="lasthit">
                                                        <option disabled selected>Select LH</option>
                                                        <option value="0">Any</option>
                                                        <option value="200">200+</option>
                                                        <option value="400">400+</option>
                                                    </select>
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                        </div>
                                                    </div>
                                                    @error('lasthit')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                    @enderror
                                                        </div>
                                            </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-2">
                                        <div class="w-1/2 px-3 mb-2">
                                            <label class="block uppercase tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                            avg tower damage
                                            </label>
                                            <div class="w-full ">
                                                    <div class="relative">
                                                    <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                                    py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                                    " id="tower_dmg" name="tower_dmg">
                                                    <option disabled selected>Select TD</option>
                                                    <option value="0">Any</option>
                                                    <option value="3000">3000+</option>
                                                    <option value="6000">6000+</option>
                                                    <option value="9000">9000+</option>
                                                </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                    </div>
                                                </div>
                                                @error('tower_dmg')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                                    </div>
                                        </div>
                                        <div class="w-1/2 px-3 mb-2">
                                                <label class="block uppercase tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                                avg hero damage
                                                </label>
                                                <div class="w-full ">
                                                        <div class="relative">
                                                        <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                                        py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                                        " id="hero_dmg" name="hero_dmg">
                                                        <option disabled selected>Select HD</option>
                                                        <option value="0">Any</option>
                                                        <option value="10000">10000+</option>
                                                        <option value="20000">20000+</option>
                                                        <option value="30000">30000+</option>
                                                    </select>
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                        </div>
                                                    </div>
                                                    @error('hero_dmg')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                    @enderror
                                                        </div>
                                            </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-2">
                                        <div class="w-1/2 px-3 mb-2">
                                            <label class="block uppercase tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                            avg ward
                                            </label>
                                            <div class="w-full ">
                                                    <div class="relative">
                                                    <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                                    py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                                    " id="ward" name="ward">
                                                    <option disabled selected>Select Ward</option>
                                                    <option value="0">Any</option>
                                                    <option value="5">5+</option>
                                                    <option value="10">10+</option>
                                                    <option value="20">20+</option>
                                                </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                    </div>
                                                </div>
                                                @error('ward')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                                    </div>
                                        </div>
                                        <div class="w-1/2 px-3 mb-2">
                                                <label class="block uppercase tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                                avg deward
                                                </label>
                                                <div class="w-full ">
                                                        <div class="relative">
                                                        <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                                        py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                                        " id="deward" name="deward">
                                                        <option disabled selected>Select Deward</option>
                                                        <option value="0">Any</option>
                                                        <option value="5">5+</option>
                                                        <option value="10">10+</option>
                                                        <option value="20">20+</option>
                                                    </select>
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                        </div>
                                                    </div>
                                                    @error('deward')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                    @enderror
                                                        </div>
                                            </div>
                                    </div>
                                    <div class="flex flex-wrap -mx-3 mb-2">
                                        <div class="w-1/3 px-3 mb-2">
                                            <label class="block uppercase tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                            avg kill
                                            </label>
                                            <div class="w-full ">
                                                    <div class="relative">
                                                    <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                                    py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                                    " id="kills" name="kills">
                                                    <option disabled selected>Select Kill</option>
                                                    <option value="0">Any</option>
                                                    <option value="5">5+</option>
                                                    <option value="10">10+</option>
                                                    <option value="20">20+</option>
                                                </select>
                                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                    </div>
                                                </div>
                                                @error('kills')
                                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                @enderror
                                                    </div>
                                        </div>
                                        <div class="w-1/3 px-3 mb-2">
                                                <label class="block uppercase tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                                avg death
                                                </label>
                                                <div class="w-full ">
                                                        <div class="relative">
                                                        <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                                        py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                                        " id="death" name="death">
                                                        <option disabled selected>Select Death</option>
                                                        <option value="0">Any</option>
                                                        <option value="5">5+</option>
                                                        <option value="10">10+</option>
                                                        <option value="20">20+</option>
                                                    </select>
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                        </div>
                                                    </div>
                                                    @error('death')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                    @enderror
                                                        </div>
                                            </div>
                                            <div class="w-1/3 px-3 mb-2">
                                                <label class="block uppercase tracking-wide text-white text-md font-semibold mb-2" for="grid-first-name">
                                                avg assist
                                                </label>
                                                <div class="w-full ">
                                                        <div class="relative">
                                                        <select class="block appearance-none w-full bg-gray-400 border border-gray-200
                                                        py-3 px-4 pr-8 rounded leading-tight  focus:bg-gray-200 focus:border-gray-500
                                                        " id="assists" name="assists">
                                                        <option disabled selected>Select Assist</option>
                                                        <option value="0">Any</option>
                                                        <option value="5">5+</option>
                                                        <option value="10">10+</option>
                                                        <option value="20">20+</option>
                                                    </select>
                                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 {{$errors->has('player_role') ? 'border-red-500' : ''}}">
                                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                                        </div>
                                                    </div>
                                                    @error('assists')
                                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                                    @enderror
                                                        </div>
                                            </div>
                                    </div>
                                <div class="flex justify-center items-center">

                                    <div class="mt-2">
                                        <a href="javascript:;" onclick="document.getElementById('achievement').submit()" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold
                                        py-2  px-4 rounded mx-auto ml-2 ">Generate</a>
                                    </div>
                                </div>
                    </form>
                    </div>
            </div>
    </div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Recommendation</div>
                <div class="card-body">
                    <form method="POST" action="/players/recommendation">
                        @csrf

                        <div class="form-group row">
                                <label for="player_role" class="col-md-4 col-form-label text-md-right">Player Role:</label>
                                    <div class="col-md-6">
                                        <select id="player_role" class="custom-select" name="player_role">
                                        <option selected>Select rank</option>
                                            <option value="core">Core</option>
                                            <option value="support">Support</option>
                                        </select>
                                        @error('player_role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">position</label>
                                    <div class="col-md-6">
                                        <select id="position" class="custom-select" name="position">
                                        <option selected>Select Position</option>
                                            <option value="carry">Carry</option>
                                            <option value="mid">Mid</option>
                                            <option value="offlaner">Offlaner</option>
                                            <option value="roamer">Roamer</option>
                                            <option value="support">Support</option>
                                        </select>
                                        @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        @if (session('constraint'))
                                        <div class="alert alert-danger">
                                            <ul>
                                                <li>{{ session('constraint') }}</li>
                                            </ul>
                                        </div>
                                @endif
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="rank" class="col-md-4 col-form-label text-md-right">Rank</label>
                                <div class="col-md-6">
                                    <select id="rank" class="custom-select" name="rank">
                                    <option selected>Select rank</option>
                                        <option value="uncalibrated">Uncalibrated</option>
                                        <option value="herald">Herald</option>
                                        <option value="guardian">Guardian</option>
                                        <option value="crusader">Crusader</option>
                                        <option value="archon">Archon</option>
                                        <option value="legend">legend</option>
                                        <option value="ancient">ancient</option>
                                        <option value="divine">divine</option>
                                        <option value="immortal">immortal</option>
                                    </select>
                                    @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                    </div>
                        <div class="form-group row">
                                <label for="experience" class="col-md-4 col-form-label text-md-right">Experience:</label>
                                    <div class="col-md-6">
                                        <select id="experience" class="custom-select" name="experience">
                                        <option selected>Select experience</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="tournament" class="col-md-4 col-form-label text-md-right">tournament</label>
                            <div class="col-md-6">
                        <select id="tournament" class="custom-select" name="tournament">
                            <option selected>Open this select menu</option>
                            @foreach($tours as $tour)
                                <option value="{{$tour->id}}">{{$tour->name}}</option>
                            @endforeach
                          </select>
                          @error('tournament')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                  </div>
                </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
