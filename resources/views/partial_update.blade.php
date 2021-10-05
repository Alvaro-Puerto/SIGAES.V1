@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <p class="font-weight-bold">Nuevo parcial</p>
                       
                    </div>
                    @if($errors->any())
                        <div class="card-header">
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first()}}
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route('semester.partial.create')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$partial->id}}">
                            <input type="hidden" name="semester_id" value="{{$partial->semester_id}}">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Nombre del parcial</label>
                                    <input type="text" name="name" class="form-control rounded-0" id="" required value="{{$partial->name}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Valor maximo a alcanzar</label>
                                    <input type="number" name="value" class="form-control rounded-0" id="" required value="{{$partial->value}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Formato</label>
                                    <select class="form-control rounded-0" name="format" id="format" required value="{{$partial->format}}">
                                        <option value="Ingresado">Valor ingresado</option>
                                        <option value="Promediado">Valor promediado</option>
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Fecha minima de ingreso</label>
                                    <input type="date" name="start_at" class="form-control rounded-0" id="" required value="{{$partial->start_at}}">
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Fecha limite de ingreso</label>
                                    <input type="date" name="end_at" class="form-control rounded-0" id="" required value="{{$partial->end_at}}">
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-end">
                                <a href="{{route('semester.partial.list', ["id" => $semester->id])}}" class="btn btn-danger">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn btn-success">Guardar registro</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <small class="d-block">
                            Nombre del semestre
                        </small>
                        <p class="font-weight-bold">
                            {{$semester->name}}
                        </p>
                        <small class="d-block">
                            Fecha inicio vigente
                        </small>
                        <p class="font-weight-bold">
                            {{$semester->start_at}}
                        </p>
                        <small class="d-block">
                            Fecha fin vigente
                        </small>
                        <p class="font-weight-bold">
                            {{$semester->end_at}}
                        </p>
                    </div>
                    <div class="card-body">
                        <small class="d-block">
                            Ciclo lectivo
                        </small>
                        <p class="font-weight-bold">
                            {{$semester->year->name}}
                        </p>
                        <small class="d-block">
                            Fecha inicio vigente
                        </small>
                        <p class="font-weight-bold">
                            {{$semester->year->start_at}}
                        </p>
                        <small class="d-block">
                            Fecha fin vigente
                        </small>
                        <p class="font-weight-bold">
                            {{$semester->year->end_at}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection