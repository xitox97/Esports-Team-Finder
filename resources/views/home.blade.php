@extends('layouts.app')

@section('content')
<section id="breadcrumb" class="ml-4 pt-2">
    <span class="italic text-sm">Home</span>
</section>

<p class="text-3xl font-semibold text-indigo-700 text-center">Succesfully Login!</p>

<div class="bg-dark-100">
    <form action="/sarep" method="POST" class="">
        @csrf
        <h2 class="text-white">Total Atrribute : @{{ totatt }}</h2>
        <div>
                <h2 class="text-white mb-2">Pass : @{{ pass }}</h2>
                <span @click="increment('pass')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">+</span>
                <span @click="decrement('pass')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">-</span>
                <input type="hidden" name="pass" v-model="pass">
                <h2 class="text-white my-2">Defend : @{{ def }}</h2>
                <span @click="increment('def')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">+</span>
                <span @click="decrement('def')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">-</span>
                <input type="hidden" name="def" v-model="def">
        </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">submit</button>
</form>
</div>

@endsection
