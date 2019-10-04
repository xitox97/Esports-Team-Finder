@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home / Team </span>
</section>
<div class="container ml-20 mt-12 max-w-6xl mr-2">
    <div class="bg-purple-100 border-t border-b border-purple-500 text-purple-700 px-4 py-3 " role="alert">
        <p class="font-bold text-lg">You currently do not have any team</p>
        <p class="text-md">Please create your own team or wait for invitation.</p>
    </div>
    <div class="flex justify-center">
        <a href="/players/achievements/create" class="btn-indigo text-white font-bold
        py-4 px-6 rounded-full w-64 shadow-md mt-4 text-center">Create New Team</a>
    </div>
</div>
@endsection
