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



                    @if ($scrimStatus->status == 'pending')
                        <li>Offer from <a href="/teams/{{$scrimStatus->team->id}}"> Team {{ $scrimStatus->team->name }} </a>  <a
                        href="/accept/{{ $scrimStatus->id }}" class="btn btn-primary btn-lg active"
                            role="button" aria-pressed="true">Accept</a>
                            <a href="/reject/{{ $scrimStatus->id }}" class="btn btn-danger btn-lg active"
                            role="button" aria-pressed="true">Reject</a>
                        </li>


                    @endif


                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
   {{-- {{ dd($dotas->accounts->toArray())}} --}}

                    {{-- {{ dd($dotas->name)}} --}}
