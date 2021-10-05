@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt-2 ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header  d-flex justify-content-between">
                    
                    <p class="font-weight-bold">
                        <span><a class="btn btn-link" href="{{route('year.config', ["id" => $semester->school_year_id])}}"><span><i class="fa fa-arrow-left text-success" aria-hidden="true"></i></span></a></span>
                        {{$semester->name}}
                    </p>
                    
                </div>
                <div class="card-body">
                    <div class="row p-0 m-0">
                        <div class="col-3">
                            <small class="d-block">
                                Año lectivo
                            </small>
                            <p class="font-weight-bold">{{$semester->year->name}}</p>
                        </div>
                        <div class="col-3">
                            <small class="d-block">
                                Inicio del semestre
                            </small>
                            <p class="font-weight-bold">{{$semester->start_at}}</p>
                        </div>
                        <div class="col-3">
                            <small class="d-block">
                                Fin del semestre
                            </small>
                            <p class="font-weight-bold">{{$semester->end_at}}</p>
                        </div>
                        <div class="col-3">
                            <small class="d-block">
                                Fecha de creación
                            </small>
                            <p class="font-weight-bold">{{$semester->created_at}}</p>
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
                                
                                @if ($item->format == 'Ingresado')
                                <span class="badge badge-pill badge-success">Valor ingresado</span>
                                @else
                                <span class="badge badge-pill badge-danger">Valor promediado</span>
                                @endif
                                <p class="mt-2">Max: {{$item->value}}</p>

                                <span>
                                    <a href="{{route('partial.update', ['id' => $item->id])}}" class="btn btn-link">
                                        <i class="fas fa-pencil-alt text-primary"></i>
                                    </a>
                                    <form class="dropdown-item" action="{{ route('partial.delete', $item->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link m-0 p-0 text-dark" type="submit">
                                          <span><i class="fa fa-times text-danger" aria-hidden="true"></i></span>
                                           
                                        </button>
                                      </form>
                                   
                                </span>
                            </div>    
                        @endforeach
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

