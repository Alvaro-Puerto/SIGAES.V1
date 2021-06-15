@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid  mt--6">
    <div class="card  mt--6">
        <div class="card-header">
            <p class="font-weight-bold">
                Detalles de la asignaturas
            </p>
        </div>
        <div class="card-body">
            <div class=" justity-content-end">
                <small class="d-flex justity-content-end">Fecha de creacion</small>
                <p class="font-weight-bold d-flex justity-content-end">{{$matter->created_at}}</p>
            </div>
            <small>Nombre de la asignatura</small>
            <p class="font-weight-bold">{{$matter->name}}</p>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-6">
                <p class="font-weight-bold">Maestros asignados a esta materia</p>
                <a  href="{{ route('matter.teacher', ['id'=>$matter->id]) }}" class="btn btn-primary"><span class="fa fa-plus"></span> Asignar nuevo maestro</a>
            </div>
            
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
                      @foreach ($matter->teachers as $teacher)
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
                        <td class="budget">
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
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      @endforeach   
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush