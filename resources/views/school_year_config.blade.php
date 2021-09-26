@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid  mt-2">
   <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold">Configuracion del curso</p>
            <small >Nombre del ciclo</small>
            <p class="font-weight-bold">{{$year->name}}</p>
            <small >Descripción del ciclo</small>
            <p class="font-weight-bold">{{$year->description}}</p>
            <small >Fecha inicio del ciclo</small>
            <p class="font-weight-bold">{{$year->start_at}}</p>
            <small>Fecha fin del ciclo</small>
            <p class="font-weight-bold">{{$year->end_at}}</p>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="{{ route('semester.new', ['id'=>$year->id]) }}" class="btn btn-primary mb-2" >
                    <span class="">
                        <i class="fa fa-plus text-white" aria-hidden="true"></i>
                    </span>
                     Añadir semetres
                </a>
            </div>
            <table class="table align-items-center table-flush" id="table-student">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Id</th>
                    <th scope="col" class="sort" data-sort="budget">Nombre del semestre</th>
                    <th scope="col" class="sort" data-sort="status">Inicia </th>
                    <th scope="col" class="sort" data-sort="status">Termina</th>
                    <th scope="col" class="sort" data-sort="status">Fecha de creación</th>
                
                    <th scope="col" class="sort" data-sort="status">Acciones</th>
                  </tr>
                </thead>
                <tbody class="list" id="tbody-student">
                @foreach ($year->semester as $semester)
                  <tr>
                    <th scope="row">
                      {{$semester->id}}
                    </th>
                    <th scope="row">
                      {{$semester->name}}
                    </th>
                    <th scope="row">
                      {{$semester->start_at}}
                    </th>
                    <th scope="row">
                      {{$semester->end_at}}
                    </th>
                    <th scope="row">
                      {{$semester->created_at}}
                    </th>
                   
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v text-primary"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="{{ route('semester.partial.list', ['id'=>$semester->id]) }}"  >Configurar parciales</a>
                       
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