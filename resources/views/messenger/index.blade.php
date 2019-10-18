@extends('layouts.app')

@section('content')

<section id="breadcrumb" class="ml-4 pt-2">
        <span class="italic text-sm">Home / Inbox</span>
    </section>
    {{-- //lg untuk laptop 1278 x XXX
    //xl tuk desktop 1440 x 737 --}}
    <div class="container ml-24 mt-5">
    @include('messenger.partials.flash')

    {{-- @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads') --}}

    <p class="text-3xl font-bold text-black">Chat</p>

    {{-- <div class=" mt-2 flex flex-col w-1/4 rounded-lg shadow-md">

        <div class="bg-white flex py-2 px-3">
            <div class="w-auto mr-4">
                    <img src="{{auth()->user()->accounts->avatar_url}}" class="rounded-full w-12">

            </div>
        <div class="w-2/4">
                <p class="text-lg text-black font-semibold">Paan</p>
                <p class="text-md text-gray-600">lorem lalalalala</p>
        </div>
        <div class="w-1/4 text-right">
                <p class="text-sm text-gray-600 mb-1">1 min</p>
                <span class="bg-red-600 rounded-full text-center text-white
                px-2 py-1 font-semibold text-sm">7</span>
        </div>

        </div>
    </div> --}}

    @foreach ($threads as $thread)

    @foreach ($thread->users as $user)
        @if($user->id != auth()->user()->id)

                <?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>
                <a href="{{ route('messages.show', $thread->id) }}">
                <div class=" mt-2 flex flex-col w-1/4 rounded-lg shadow-md">

                    <div class="bg-white flex py-2 px-3">
                        <div class="w-auto mr-4">
                            @if($user->accounts->avatar_url == null)
                            <img src="{{asset('img/default.svg')}}" class="rounded-full w-12">
                            @else
                            <img src="{{$user->accounts->avatar_url}}" class="rounded-full w-12">
                            @endif
                        </div>
                    <div class="w-2/4">
                            <p class="text-lg text-black font-semibold">{{ $user->name }}</p>
                            <p class="text-md text-gray-600"> {{ $thread->latestMessage->body }}</p>
                    </div>
                    <div class="w-1/4 text-right">
                            <p class="text-sm text-gray-600 mb-1">1 min</p>
                            <span class="bg-red-600 rounded-full text-center text-white
                            px-2 py-1 font-semibold text-sm">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</span>
                    </div>

                    </div>
                </div></a>
        @endif
            @endforeach

        @endforeach

            {{-- @foreach ($threads as $thread)

            @foreach ($thread->users as $user)
                @if($user->id == auth()->user()->id)

                <div class="media alert {{ $class }}">
                    <h4 class="media-heading">
                        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
                        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)</h4>
                    <p>
                        {{ $thread->latestMessage->body }}
                    </p>
                    <p>
                        <small><strong>Creator:</strong> {{ $thread->creator()->name }}</small>
                    </p>
                    <p>
                        <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
                    </p>
                </div>
                @endif
            @endforeach

        @endforeach --}}
    </div>









    @stop
    </div>
