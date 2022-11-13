@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt-2">
    <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold">
            Configurar horarios</p>
        </div>
        <div class="card-header">
            <p class="font-weight-bold">{{$school_year->name}}</p>
        </div>
        <div class="card-body">
        <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Nombre del curso</th>
                      <th scope="col" class="sort" data-sort="status">Capacidad</th>
                      <th scope="col" class="sort" data-sort="status">Fecha de creación</th>
                      <th scope="col" class="sort" data-sort="status">Acciones</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($courses as $course)
                    <tr>
                      <th scope="row">
                        {{$course->id}}
                      </th>
                      <th scope="row">
                        {{$course->name}}
                      </th>
                      <th scope="row">
                        {{$course->capacity}}
                      </th>
                      <th scope="row">
                        {{$course->created_at}}
                      </th>
                      <td class="text-cemter">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-primary"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('calendar.config.detail', ['id'=>$course->id]) }}">
                            <span><i class="fa fa-cogs text-success" aria-hidden="true"></i></span>
                              Configurar horario
                            </a>
                            
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