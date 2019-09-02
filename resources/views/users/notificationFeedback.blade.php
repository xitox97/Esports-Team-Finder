@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notification center</div>

                <div class="card" >





                    <div class="card-body">
                      <h5 class="card-title text-center"><b>Notification center</b> </h5>
                      <p class="card-text"></p>
                    </div>

                    @foreach ($offers as $offer)

                    @if ($offer->status == 'pending')
                        <li>Offer from <a href="/teams/{{$offer->team->id}}"> Team {{ $offer->team->name }} </a>  <a
                        href="/accept/{{ $offer->id }}" class="btn btn-primary btn-lg active"
                            role="button" aria-pressed="true">Accept</a>
                            <a href="/reject/{{ $offer->id }}" class="btn btn-danger btn-lg active"
                            role="button" aria-pressed="true">Reject</a>
                        </li>


                    @endif

                    @endforeach

                    @if($myOffers != null)
                        @foreach ($myOffers as $myoffer)

                        @if ($myoffer->status == 'Accepted')
                        <div class="alert alert-success">
                            <ul>
                            <li><b> <a href="{{ url('/players/' . $myoffer->user->accounts->dota_id) }}">
                                {{ $myoffer->user->accounts->steam_name }} </a></b> has accept the offer</li>
                            </ul>
                        </div>
                        @elseif ($myoffer->status == 'Rejected')
                        <div class="alert alert-warning">
                            <ul>
                            <li><b> <a href="{{ url('/players/' . $myoffer->user->accounts->dota_id) }}">
                                {{ $myoffer->user->accounts->steam_name }} </a></b> has reject the offer</li>
                            </ul>
                        </div>
                        @endif
                        @endforeach
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ session('success') }}</li>
                        </ul>
                    </div>
                @endif
                @if (session('reject'))
                <div class="alert alert-primary">
                    <ul>
                        <li>{{ session('reject') }}</li>
                    </ul>
                </div>
            @endif
                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
   {{-- {{ dd($dotas->accounts->toArray())}} --}}

                    {{-- {{ dd($dotas->name)}} --}}