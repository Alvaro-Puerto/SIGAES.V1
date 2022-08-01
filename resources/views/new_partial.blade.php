@extends('layouts.app')

@section('content')
@include('users.partials.header', [
        'title' => '',
        'description' => 'Crear un nuevo parcial asociado a un semestre',
        'class' => 'col-lg-12 '
  ]) 
    <div class="container mt--7">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span><i class="fa fa-plus text-primary"></i></span>
                        <p class="font-weight-bold">Nuevo parcial</p>
                       
                    </div>
                  
                    <div class="card-body">
                        <form action="{{route('semester.partial.create')}}" method="post">
                            @csrf
                            <input type="hidden" name="semester_id" value="{{$id}}">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="">Nombre del parcial <span class="font-weight-bold text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control rounded-0" id="" value="{{ old('name')}}" >
                                    @error('name')
                                        <small class="font-weight-bold text-danger">
                                            {{$message}}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Valor maximo a alcanzar <span class="font-weight-bold text-danger">*</span></label>
                                    <input type="number" name="value" class="form-control rounded-0" id="" value="{{old('value')}}">
                                    @error('value')
                                        <small class="font-weight-bold text-danger">
                                            {{$message}}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Formato <span class="font-weight-bold text-danger">*</span></label>
                                    <select class="form-control rounded-0" name="format" id="format" >
                                        <option value="Ingresado">Valor ingresado</option>
                                        <option value="Promediado">Valor promediado</option>
                                    </select>
                                </div>
                                    @error('format')
                                        <small class="font-weight-bold text-danger">
                                            {{$message}}
                                        </small>
                                    @enderror
                                <div class="form-group col-6">
                                    <label for="">Fecha minima de ingreso <span class="font-weight-bold text-danger">*</span></label>
                                    <input type="date" name="start_at" class="form-control rounded-0" id="" value="{{ old('start_at') }}">
                                    @error('start_at')
                                        <small class="font-weight-bold text-danger">
                                            {{$message}}
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-6">
                                    <label for="">Fecha limite de ingreso <span class="font-weight-bold text-danger">*</span></label>
                                    <input type="date" name="end_at" class="form-control rounded-0" id="" value="{{ old('end_at') }}">
                                    @error('end_at')
                                        <small class="font-weight-bold text-danger">
                                            {{$message}}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-end">
                                <a href="{{route('semester.partial.list', ["id" => $id])}}" class="btn btn-danger">
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