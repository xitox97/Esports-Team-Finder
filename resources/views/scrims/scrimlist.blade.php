@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Scrim list</div>

                <div class="card" >

                    <div class="card-body">
                      <h5 class="card-title text-center"><b>Scrim list</b> </h5>
                      <p class="card-text"></p>
                    </div>

                    <table class="table table-striped text-center">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Team</th>
                                <th scope="col">Time</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>

                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($myTeam->scrims as $scrim)



                                    <tr>
                                      <td>{{$loop->index + 1}}</td>
                                      <td> <a href="{{ url('/teams/' . $scrim->id) }}">{{$scrim->name}}</a> </td>
                                      <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $scrim->pivot->date_time)->format('h:i:s a') }}</td>
                                      <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $scrim->pivot->date_time)->format('d/m/Y') }}</td>
                                      <td>
                                        <a href="{{  url('/scrims/'. $scrim->pivot->id . '/details')  }}" class="btn btn-success"
                                                role="button" aria-pressed="true">View Details</a></td>
                                    </tr>


                                  @endforeach
                                </tbody>
                          </table>

                  </div>

            </div>
        </div>
    </div>
</div>
@endsection

