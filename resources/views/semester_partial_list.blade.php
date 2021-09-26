@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt-2 ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header  d-flex justify-content-between">
                    
                    <p class="font-weight-bold">
                        {{$semester->name}}
                    </p>
                    <a class="btn btn-link" href="{{route('year.config', ["id" => $semester->school_year_id])}}"><span><i class="fa fa-arrow-left text-danger" aria-hidden="true"></i></span>Regresar</a>
                </div>
                <div class="card-body">
                    <div class="row p-0 m-0">
                        <div class="col-3">
                            <small class="d-block">
                                Inicio del semestre
                            </small>
                            <p>{{$semester->start_at}}</p>
                        </div>
                        <div class="col-3">
                            <small class="d-block">
                                Fin del semestre
                            </small>
                            <p>{{$semester->end_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <p class="font-weight-bold">Lista de parciales por <span class="text-success">{{$semester->name}}</span></p>
                    <a href="{{route('semester.partial.new', ["id" => $semester->id])}}" class="btn btn-success">
                        <span><i class="fa fa-plus text-white" aria-hidden="true"></i></span>
                        Añadir nuevo parcial
                    </a>
                </div>
                <div class="card-body ">
                    <div class="row">
                        @foreach ($semester->partials as $item)
                            <div class="col-2 border border-black text-center">
                                <small class="d-block">Nombre </small>
                                <p class="text-dark font-weight-bold pt-2">{{$item->name}}</p>

                                <p class="mt-2">Max: {{$item->value}}</p>
                            </div>    
                        @endforeach
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

