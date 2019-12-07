@extends('layouts.app')

@section('content')

<section id="breadcrumb" class="ml-4 pt-2 text-white font-medium tracking-wide">
        <span class="italic text-sm">Home / Inbox</span>
    </section>
    {{-- //lg untuk laptop 1278 x XXX
    //xl tuk desktop 1440 x 737 --}}
    <div class="container mt-5">
    @include('messenger.partials.flash')



    <div class="flex justify-around pr-5">
        <div class="w-6/12">
            <p class="text-3xl font-bold text-white uppercase  border-b border-gray-600">Inbox</p>
            @foreach ($threads as $thread)
                @foreach ($thread->users as $user)
                        @if($user->id != auth()->user()->id)
                            <?php $class = $thread->isUnread(Auth::id()) ? 'bg-white border-indigo-600 border-l-8 flex px-3 py-2' : ''; ?>
                                {{-- <a href="{{ route('messages.show', $thread->id) }}"> --}}
                                    <div class="flex flex-col rounded-lg  hover:shadow-lg mt-4 bg-white  cursor-pointer"
                                    v-on:click="getThread({{$thread}},{{$user}},{{$user->accounts}})"
                                    >
                                        <div class="bg-dark-100 flex py-2 px-3 {{$class}}">
                                            <div class="w-auto mr-4">
                                                @if($user->accounts->avatar_url == null)
                                                    <img src="{{asset('img/default.svg')}}" class="rounded-full w-12">
                                                @else
                                                    <img src="{{$user->accounts->avatar_url}}" class="rounded-full w-12">
                                                @endif
                                            </div>
                                            <div class="w-2/4">
                                                <p class="text-lg text-white font-semibold">{{ $user->name }}</p>
                                                <p class="text-md text-gray-400"> {{ $thread->latestMessage->body }}</p>
                                            </div>
                                            <div class="w-1/4 text-right">
                                                <p class="text-sm text-gray-600 mb-1">1 min</p>
                                                <span class="bg-red-600 rounded-full text-center text-white
                                                px-2 py-1 font-semibold text-sm">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                {{-- </a> --}}
                        @endif
                    @endforeach
                @endforeach
        </div>
        <chat-component  v-bind:thread="thread" v-bind:usersend="sendto" v-bind:acc="account" v-bind:chat="chat"></chat-component>

    </div>

    </div>

    @endsection
