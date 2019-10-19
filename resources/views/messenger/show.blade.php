@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
        <span class="italic text-sm">Home / Inbox</span>
    </section>

    <div class="container ml-24 mt-5">
    @include('messenger.partials.flash')
    <p class="text-3xl font-bold text-black">Chat</p>
    <div class="flex">

        <div class="border-t-2 ml-10 w-8/12" v-if="chat == false">
            <div class="mt-4">
                <div>
                    <p class="font-bold text-xl text-gray-700 capitalize">Lets Play Dota</p>
                    <p class="font-semibold text-md text-gray-600 -mt-1">From: Paan</p>
                </div>

@foreach ($thread->messages as  $message)
            {{-- first --}}

            <div class="flex flex-col">
                    @if(auth()->user()->id != $message->user->id)
                <div class="mt-4 flex py-1 px-2">
                    <div>
                            @if($message->user->accounts->avatar_url == null)
                            <img src="{{asset('img/default.png')}}"
                            class="rounded-full w-12" >
                            <p class="text-xs font-medium">{{ $message->user->accounts->steam_name }}</p>
                            @else
                            <img src="{{ $message->user->accounts->avatar_url}}" class="rounded-full w-12">
                            <p class="text-xs font-medium">{{ $message->user->accounts->steam_name }}</p>
                            @endif
                    </div>
                    <div class="rounded-lg bg-white ml-4 p-2 shadow-md">
                        <p class="max-w-xl font-medium">{{ $message->body }}</p>
                        <p class="text-xs text-gray-500 text-right">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                @elseif(auth()->user()->id == $message->user->id)
                <div class="flex flex-row-reverse mt-4 py-1 px-2">
                        <div>
                                <img src="{{ $message->user->accounts->avatar_url}}" class="rounded-full w-12">
                                <p class="text-xs font-medium">{{ $message->user->accounts->steam_name }}</p>

                        </div>
                        <div class="rounded-lg bg-indigo-700 mr-4 p-2 shadow-md">
                            <p class="max-w-xl font-medium text-white">{{ $message->body }}</p>
                            <p class="text-xs text-gray-300 text-right">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @endif
                {{-- second --}}
            </div>

            @endforeach
            {{-- send message --}}

                    <form action="{{ route('messages.update', $thread->id) }}" method="post" class="flex items-start bg-white rounded-lg px-3 pt-3  mt-6 hover:shadow-lg">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                    <textarea class="
                    outline-none resize-none w-full  focus:border-indigo-600"
                    name="message" class="form-control"
                    placeholder="Type a message....">{{ old('message') }}</textarea>
                    <input type="text" name="recipients"
                    value="{{ $sendTo->id }}" hidden>
                    <button type="submit" class="bg-indigo-600 border-indigo-700 font-bold hover:bg-indigo-700 pb-1 pt-2 px-2 rounded-full text-white">
                            <i class="material-icons text-white text-center">
                                    send
                                    </i>
                    </button></form>
            </div>
        </div>

    </div>
    </div>


@endsection
