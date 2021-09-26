@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <p class="font-weight-bold">Nuevo parcial</p>
                <a class="btn btn-link" href="{{route('semester.partial.list', ["id" => $id])}}"><span><i class="fa fa-times text-danger mr-2" aria-hidden="true"></i></span>Cancelar</a>
            </div>
            <div class="card-body">
                <form action="{{route('semester.partial.create')}}" method="post">
                    @csrf
                    <input type="hidden" name="semester_id" value="{{$id}}">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="">Nombre del parcial</label>
                            <input type="text" name="name" class="form-control rounded-0" id="" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Valor maximo a alcanzar</label>
                            <input type="number" name="value" class="form-control rounded-0" id="" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Formato</label>
                            <input type="text" name="format" class="form-control rounded-0" id="" required>
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
@endsection