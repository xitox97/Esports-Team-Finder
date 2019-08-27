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
                                <th scope="col">Date and Time</th>
                                <th scope="col">Action</th>

                              </tr>
                            </thead>
                            @foreach ($myTeam->scrims as $scrim)


                            <tbody>
                                    <tr>
                                      <th scope="row">1</th>
                                      <td> <a href="{{ url('/teams/' . $scrim->id) }}">{{$scrim->name}}</a> </td>
                                      <td>{{$scrim->pivot->date_time}}</td>
                                      <td><button type="button" class="btn btn-outline-primary">Primary</button></td>
                                    </tr>

                                  </tbody>
                                  @endforeach
                            {{-- <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td><button type="button" class="btn btn-outline-primary">Primary</button></td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td><button type="button" class="btn btn-outline-primary">Primary</button></td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td><button type="button" class="btn btn-outline-primary">Primary</button></td>
                              </tr>
                            </tbody> --}}
                          </table>

                  </div>

            </div>
        </div>
    </div>
</div>
@endsection
   {{-- {{ dd($dotas->accounts->toArray())}} --}}

                    {{-- {{ dd($dotas->name)}} --}}
