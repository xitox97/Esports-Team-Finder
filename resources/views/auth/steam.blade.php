@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">You need to connect your accounts with steam to continue</div>
                <div class="text-center">
                    <img src="{{ URL::to('/') }}/img/steam.png" alt="" class="w-50"><br>
                    <a href="/login/steam" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Connect</a>
                </div>
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

