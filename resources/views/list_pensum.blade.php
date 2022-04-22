@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid  mt-2">
   <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold">
              <span>
                <a href="{{route('year.list')}}">
                  <i class="fa fa-arrow-left text-success" aria-hidden="true"></i>
                </a>
              </span>
              Configuración del pensum
            </p>
            <div class="row">
              <div class="col-3">
                <small >Nombre del curso</small>
                <p class="font-weight-bold">{{$course->name}}</p>
              </div>
             
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <a href="{{ route('course.pensum.new', ['id'=>$course->id]) }}" class="btn btn-primary mb-2" >
                    <span class="">
                        <i class="fa fa-plus text-white" aria-hidden="true"></i>
                    </span>
                     Añadir nuevo pensum
                </a>
            </div>
            <table class="table align-items-center table-flush" id="table-student">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Id</th>
                    <th scope="col" class="sort" data-sort="budget">Nombre del pensum</th>
                    <th scope="col" class="sort" data-sort="status">Ciclo vigente </th>
                   
                    <th scope="col" class="sort" data-sort="status">Fecha de creación</th>
                
                    <th scope="col" class="sort" data-sort="status">Acciones</th>
                  </tr>
                </thead>
                <tbody class="list" id="tbody-student">
                  @foreach ($course->pensum as $pensum)
                  <tr>
                    <td>
                      {{$pensum->id}}
                    </td>
                    <th scope="row">{{$pensum->nombre}}</th>
                    <td>{{$pensum->school_year}}</td>
                    <td>{{$pensum->created_at}}</td>
                    
                  </tr>
                  @endforeach
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