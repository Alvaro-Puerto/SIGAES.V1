@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header">
                    <p class="font-weight-bold">
                        Detalles de la matricula
                    </p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <small class="d-block">Año lectivo</small>
                            <p class="font-weight-bold">
                                {{$enrollement->year->name}}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <small>Grado lectivo</small>
                            <p class="font-weight-bold">
                               {{$enrollement->course->name}}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <small class="d-block">Modalidad</small>
                            <p class="font-weight-bold">
                                {{$enrollement->modality->name}}
                             </p>
                        </div>
                        <div class="col-md-3">
                            <small class="d-block">Turno</small>
                            <p class="font-weight-bold">
                                {{$enrollement->turn->name}}
                             </p>
                        </div>
                        <div class="col-md-3">
                            <small class="d-block">Tipo de ingreso</small>
                            <p class="font-weight-bold">
                                {{$enrollement->type}}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <small class="d-block">Repitente</small>
                            @if ($enrollement->is_repeat)
                                <span class="badge badge-danger">Repitente</span>    
                            @else
                                <span class="badge badge-success">No es repitente</span>    
                            @endif                                                        
                        </div>
                        <div class="col-md-3">
                            <small class="d-block">Fecha de matricula</small>
                            <p class="font-weight-bold">
                                {{$enrollement->created_at}}</p>                                                   
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row bg-white">
        <div class="col-12">
            <div class="card">
                <div class="card-body row">
                    <div class="col">

                    </div>
                    @foreach ($year_school->semester as $item)
                    <div class="col-4">
                        <p class="font-weight-bold">{{$item->name}}</p>
                        <div class="row">
                            @foreach ($item->partials as $partial)
                                <div class="col">
                                    {{$partial->name}}
                                </div>
                            @endforeach
                        </div>
                    </div>     
                    @endforeach
                </div>
                <div class="card-body row d-block">
                    @foreach ($enrollement->matters as $item)
                        <div class="col-12 border-bottom">
                            <p>{{$item->name}}
                                <span>
                                    <a href="{{route('partial.matter.update', ["id" => $item->pivot->id, 'id_enrollement' => $enrollement->id])}}">
                                        <i class="fas fa-external-link-square-alt text-success"></i>
                                    </a>
                                </span>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
       
        
    </div>
</div>

@endsection