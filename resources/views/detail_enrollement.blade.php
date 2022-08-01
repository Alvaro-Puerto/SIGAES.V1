@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card border-bottom-0">
                <div class="card-header d-flex justify-content-between" >
                    <p class="font-weight-bold">
                        Detalles de la matricula
                    </p>
                    <a href="{{ route('enrollement.print', ['id'=> $enrollement->id]) }}" target="_blank" class="btn btn-success">Imprimir</a>
                </div>
                <div class="card-body">
                <div class="row">
                        <div class="col-md-3">
                            <small class="d-block">Nombres completos</small>
                            <p class="font-weight-bold">
                                {{$enrollement->student->user->fullName()}}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <small>Codigo de estudiante</small>
                            <p class="font-weight-bold">
                               {{$enrollement->student->code}}
                            </p>
                        </div>
                        <div class="col-md-3">
                            <small class="d-block">Sexo</small>
                            <p class="font-weight-bold">
                                {{$enrollement->student->user->gender}}
                             </p>
                        </div>
                        
                    </div>
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
    <div class="row">
        {{--<div class="col-12">
            <div class="card">
                <div class="card-body row">
                    <div class="col-2">

                    </div>
                    @foreach ($year_school->semester as $item)
                    <div class="col-5">
                        <p class="font-weight-bold">{{$item->name}}</p>
                        <div class="row">
                            @foreach ($item->partials as $partial)
                                <div class="col">
                                    <small>{{$partial->name}}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>     
                    @endforeach
                </div>
                <div class="card-body mt--2 ">
                    @foreach ($matter_and_partial as $item)
                        <div class="row ">
                            <div class="col-2 p-2 d-flex justify-content-end border-bottom border-top">
                                <small>{{$item->name_matter}}
                                    <span>
                                        <a href="{{route('partial.matter.update', ["id" => $item->id_pivot, 'id_enrollement' => $enrollement->id])}}">
                                            <i class="fas fa-external-link-square-alt text-success"></i>
                                        </a>
                                    </span>
                                </small>
                            </div>
                            @foreach ($item->partials as $partial)
                                <div class="col border text-center align-items-center justify-content-center">
                                    <p class="text-center">{{$partial->pivot->value}}</p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
       <div class="col-12">
           <div class="card border-top-0">
               <div class="card-body">
               <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="border-right">Asignaturas</th>
                        @foreach ($year_school->semester as $item)
                            @foreach ($item->partials as $partial)
                                <th class="border-right" scope="col "><small>{{$partial->name}}</small></th>
                            @endforeach
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach ($matter_and_partial as $item)
                        <tr>
                            <td class="d-flex justify-content-end border-right">
                            <small>{{$item->name_matter}}
                                <span>
                                    <a href="{{route('partial.matter.update', ["id" => $item->id_pivot, 'id_enrollement' => $enrollement->id])}}">
                                        <i class="fas fa-external-link-square-alt text-success"></i>
                                    </a>
                                </span>
                            </small>
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