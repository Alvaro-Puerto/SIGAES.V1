@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt-2 ">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <p class="font-weight-bold">Asignar materias por matriculas</p>
                    <a href="{{route('student.detail', $enrollement->student_id)}}" class="btn btn-link">
                        <span><i class="fa fa-check text-succcess " aria-hidden="true"></i></span>  
                        Finalizar registro
                    </a>
                </div>
                <div class="card-body d-flex">
                    <div class="row " >
                        @foreach ($matters as $item)
                            <div class="col-3 card m-2">
                                <div class="">
                                    <div class="card-footer border-0 text-center">
                                        <form action="{{route('enrollement_matter.asing')}}" method="post" class="m-0 p-0">
                                            @csrf
                                            <input type="hidden" name="enrollement_id" value="{{$id}}">
                                            <input type="hidden" name="matter_id" value="{{$item->id}}">
                                            <button type="submit" class="btn btn-link d-block">
                                                <span><i class="fa fa-check text-success d-block text-success" aria-hidden="true"></i></span>
                                                {{$item->name}}
                                            </button>    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="text-dark font-weight-bold">Materias seleccionadas</p>
                </div>
                <div class="card-body d-flex">
                    <div class="row">
                        @foreach ($enrollement->matters as $item)
                            <div class="col-3 card m-2">
                                <div class="">
                                    <div class="card-footer border-0 text-center">
                                        <form action="{{route('enrollement_matter.detach')}}" method="post" class="m-0 p-0">
                                            @csrf
                                            <input type="hidden" name="enrollement_id" value="{{$id}}">
                                            <input type="hidden" name="matter_id" value="{{$item->id}}">
                                            <button type="submit" class="btn btn-link d-block">
                                                <span><i class="fa fa-times text-danger d-block text-center" aria-hidden="true"></i></span>
                                                {{$item->name}}
                                            </button>    
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection