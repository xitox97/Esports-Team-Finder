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
                    {{-- @if(auth()->user()->id != ) --}}
                <div class="mt-4 flex py-1 px-2">
                    <div>
                            @if($message->user->accounts->avatar_url == null)
                            <img src="{{asset('img/default.svg')}}"
                            lass="rounded-full w-12">
                            @else
                            <img src="{{ $message->user->accounts->avatar_url}}" class="rounded-full w-12">
                            @endif
                    </div>
                    <div class="rounded-lg bg-white ml-4 p-2 shadow-md">
                        <p class="max-w-xl font-medium">{{ $message->body }}</p>
                        <p class="text-xs text-gray-500 text-right">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                {{-- @elseif($key % 2 == 0) --}}
                <div class="flex flex-row-reverse mt-4 py-1 px-2">
                        <div>
                                <img src="{{ $message->user->accounts->avatar_url}}" class="rounded-full w-12">

                        </div>
                        <div class="rounded-lg bg-indigo-700 mr-4 p-2 shadow-md">
                            <p class="max-w-xl font-medium text-white">{{ $message->body }}</p>
                            <p class="text-xs text-gray-300 text-right">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                {{-- @endif --}}
                {{-- second --}}

            </div>

            @endforeach
            {{-- send message --}}
                <div class=" flex items-start bg-white rounded-lg px-3 pt-3  mt-6 hover:shadow-lg">
                    <textarea class="
                    outline-none resize-none w-full  focus:border-indigo-600"
                    name="message" class="form-control"
                    placeholder="Type a message....">{{ old('message') }}</textarea>
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-2
                    border-indigo-700  rounded-full">
                            <i class="material-icons text-white text-center">
                                    send
                                    </i>
                    </button>

                </div>

            </div>


        </div>

    </div>
    </div>


@foreach ($thread->messages as $key => $message)
{{var_dump($key)}}
<div class="media">
        <a class="pull-left" href="#">
                @if($message->user->accounts->avatar_url == null)
                <img src="{{asset('img/default.svg')}}"
                 alt="{{ $message->user->accounts->steam_name }}" class="img-circle " style="width: 40%;">
                @else
                <img src="{{$message->user->accounts->avatar_url}}"
                 alt="{{ $message->user->accounts->steam_name }}" class="img-circle">
                @endif

        </a>
        <div class="media-body">
            <h5 class="media-heading">{{ $message->user->accounts->steam_name }}</h5>
            <p>{{ $message->body }}</p>
            <div class="text-muted">
                <small>Posted {{ $message->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
    {{-- {{dd( $thread->participants()->where('user_id','!=', auth()->user()->id)->firstOrFail())}} --}}

@endforeach

{{-- {{dd($thread->creator()->id)}} --}}

        <h2>Add a new message</h2>

        <form action="{{ route('messages.update', $thread->id) }}" method="post">
            {{ method_field('put') }}
            {{ csrf_field() }}

            <!-- Message Form Input -->
            <div class="form-group">
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>

                    <input type="text" name="recipients"
                    value="{{ $sendTo->id }}" hidden>{{ $sendTo->name }}

            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Send</button>
            </div>
        </form>


    </div>
@stop
