@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid  mt--6">
   <div class="card mt--6">
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
                <a href="{{ route('semester.new', ['id'=>$year->id]) }}" class="btn btn-primary" >
                    <span class="">
                        <i class="fa fa-plus text-white" aria-hidden="true"></i>
                    </span>
                     Añadir semetres
                </a>
            </div>
            @foreach ($year->semester as $semester)
                <div>
                    <a class="nav-link active" href={{$semester->id}} 
                                       data-toggle="collapse" 
                                       role="button" 
                                       aria-expanded="false" 
                                       aria-controls="navbar-examples-5"
                                       >
                <i class="fab fa-laravel" style="color: #f4645f;"></i>
                <span class="nav-link-text" style="color: #f4645f;">{{$semester->name }}</span>
            </a>
            <div class="collapse " id={{$semester->id}}>
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                       
                    </li>
                    <li class="nav-item">
                       
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">
                            {{ __('Horarios') }}
                        </a>
                    </li>
                </ul>
                </div>
            @endforeach
            
            </div>
        </div>
   </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush