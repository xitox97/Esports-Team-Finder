@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('image')
    <div style="background-image: url({{ asset('/svg/503.svg') }});" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))
