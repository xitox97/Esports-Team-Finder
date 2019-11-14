@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2 text-white font-medium tracking-wide">
    <span class="italic text-sm">Home / Team / Edit </span>
</section>
<div class="container ml-20 mt-12 max-w-5xl mr-2 xl:ml-auto xl:mr-auto">

            <div class="flex flex-col justify-center">
                @if(session('cannot'))
                <div v-show="alert" class="mt-1 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" v-on:click="hideAlert" role="alert">
                    <strong class="font-bold">Ops!</strong>
                    <span class="block sm:inline">{{ session('cannot') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            @endif
                    <p class=" text-black font-bold text-2xl mb-2 text-indigo-500">Edit Team</p>
            <form method="POST" action="/teams/{{$team->id}}" enctype="multipart/form-data" class="bg-dark-100 rounded-lg
                    shadow-lg pb-4 pt-6 px-6 w-2/3">
                            @csrf
                            @method('PATCH')
                            <div class="flex flex-wrap -mx-3 mb-1">
                              <div class="w-full  w-2/3 px-3 md:mb-0">
                                <label class="block capitalize tracking-wide text-white text-md font-bold mb-1" for="name">
                                  Team Name
                                </label>
                                <input class="appearance-none block w-full  text-black capitalize border-2 border-gray-300 rounded
                                py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-purple-500 bg-gray-300" id="name" type="text"
                                placeholder="{{$team->name}}" name="name">
                              </div>
                              @error('name')
                            <p class="text-red-500 text-xs italic ml-4">{{ $message }}</p>
                            @enderror
                            </div>
                                  <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                      <label class="block capitalize tracking-wide text-white text-md font-bold mb-2" for="city">
                                        City
                                      </label>
                                      <input class="appearance-none block w-full  text-gray-800 border-2 border-gray-300 rounded
                                      py-3 px-4 leading-tight focus:outline-none focus:border-purple-500 bg-gray-300" id="city" type="text"
                                      placeholder="{{$team->area}}" name="area" required>
                                    </div>
                                    @error('area')
                                    <p class="text-red-500 text-xs italic ml-4">{{ $message }}</p>
                                    @enderror
                                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                      <label class="block capitalize tracking-wide text-white text-md font-bold mb-2" for="state">
                                        State
                                      </label>
                                      <div class="relative">
                                        <select class="block appearance-none w-full border-2 border-gray-300
                                        text-gray-800 py-3 px-4 pr-8 rounded leading-tight focus:outline-none
                                        focus:border-purple-500 bg-gray-300" name="state" required>
                                        <option selected disabled>{{$team->state}}</option>
                                        <option value="Johor">Johor</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Kelantan">Kelantan</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Penang">Penang</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Terengganu">Terengganu</option>
                                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                                        <option value="Labuan">Labuan</option>
                                        <option value="Putrajaya">Putrajaya</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-800">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                    </div>
                                  </div>
                                  <div class="flex flex-wrap -mx-3 mb-6 mt-5">
                                    <div class="w-full  px-3 mb-6 md:mb-0">
                                        <label class="block capitalize tracking-wide text-white text-md font-bold mb-2" for="grid-first-name">
                                            Team Description
                                          </label>
                                      <textarea class="appearance-none block w-full  text-gray-800 border-2 border-gray-300 rounded
                                      py-3 px-4 leading-tight focus:outline-none focus:border-purple-500 bg-gray-300" 
                                      placeholder="{{$team->description}}"
                                      rows="4" name="description"></textarea>
                                    </div>
                                  </div>
                                  <div class="flex -mx-3 mb-6 mt-5 justify-center items-center">
                                        <label class="block capitalize tracking-wide text-white text-md font-bold mb-2 mr-5" for="grid-last-name">
                                          Image
                                        </label>
                                        <div class="flex justify-center">
                                            <label class="w-64 flex flex-row justify-center items-center px-1 py-2 bg-white text-blue rounded-lg shadow-lg
                                            tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-600 hover:text-white bg-gray-300">
                                            <i class="material-icons md-36">
                                                cloud_upload
                                                </i>
                                                <span class="ml-3 text-base leading-normal font-semibold">Select an image</span>
                                                <input type='file' class="hidden" name="image" id="image">
                                            </label>
                                        </div>
                                  </div>
                                <div class="text-center">
                                    <button type="submit" class="btn-indigo text-white font-bold
                                    py-2  px-4 rounded mx-auto ml-2 ">Submit</button>
                                    @if (session('error'))
                                    <p class="text-red-500 text-xs italic ml-4">{{ session('error') }}</p>
                                    @endif
                                </div>
                        </form>
                </div>
</div>
@endsection
