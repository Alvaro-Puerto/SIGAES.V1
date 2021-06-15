@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-md-4 card">
            <div class="card-header">
                <p class="font-weight-bold">Asignatura</p>
            </div>
            <div class="card-body">
                <small>Nombre de la asignatura</small>
            <p class="font-weight-bold">{{$matter->name}}</p>
            </div>
        </div>
        <div class="col-md-8 card">
            <div class="card-header">
                <p class="font-weight-bold">Maestros a asignar</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" class="sort" data-sort="name">Id</th>
                          <th scope="col" class="sort" data-sort="budget">Nombres</th>
                          <th scope="col" class="sort" data-sort="status">Apellidos</th>
                          <th scope="col">Email</th>
                          <th scope="col" class="sort" data-sort="completion">Telefono</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                          @foreach ($teachers as $teacher)
                          <tr>
                            {{-- <th scope="row">
                              <div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle mr-3">
                                  <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                                </a>
                                <div class="media-body">
                                  <span class="name mb-0 text-sm">Argon Design System</span>
                                </div>
                              </div> --}}
                             
                            </th>
                            <td>
                                {{$teacher->id}}
                            </td>
                            <td class="budget">
                              {{$teacher->user->first_name}}
                            </td>
                            <td>
                              <span class="badge badge-dot mr-4">
                                {{$teacher->user->last_name}}
                              </span>
                            </td>
                            <td>
                                {{$teacher->user->email}}
                            </td>
                            <td>
                              <div class="d-flex align-items-center">
                                {{$teacher->user->phone}}
                              </div>
                            </td>
                            <td class="text-right">
                                <form  action="{{url('matter/teacher/assign')}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="matterId" id="matterId" value="{{$matter->id}}" hidden>
                                    <input type="number" name="teacherId" id="teacherId" value="{{$teacher->id}}" hidden>
                                    <button class="btn btn-success" type="submit">Asignar materia</button>
                                </form>
                               
                            </td>
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