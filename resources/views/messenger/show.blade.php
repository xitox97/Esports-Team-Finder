@extends('layouts.master')

@section('content')
    <div class="col-md-6">
        <h1>{{ $thread->subject }}</h1>


@foreach ($thread->messages as $message)
<div class="media">
        <a class="pull-left" href="#">
            <img src="{{$message->user->accounts->avatar_url}}"
                 alt="{{ $message->user->accounts->steam_name }}" class="img-circle">
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
