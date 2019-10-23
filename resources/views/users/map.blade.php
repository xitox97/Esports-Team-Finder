@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / map </span>
</section>
{{-- //lg untuk laptop 1278 x XXX
//xl tuk desktop 1440 x 737 --}}
<div class="container ml-24 mt-12">

    <map-component v-bind:user="{{ Auth::User()->id}}"></map-component>
</div>
@endsection


