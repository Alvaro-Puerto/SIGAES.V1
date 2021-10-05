@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold">Nuevo curso</p>
        </div>
        <div class="card-body">
            <form  method="post" action="{{url('matter/new')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""></label>
                        <input type="text" name="school_information_id" class="form-control " id=""  value="{{$matter->school_information_id}}" hidden>
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Id</label>
                        <input type="text" name="id" class="form-control " id="" value="{{$matter->id}}" readonly>
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Nombre de la asignatura</label>
                        <input type="text" name="name" class="form-control " id="name" required value="{{$matter->name}}">
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Descripción de la asignatura</label>
                        <input type="text" name="description" class="form-control " id="description" required value="{{$matter->description}}">
                    </div>
                    <div class="form-group col-12 d-flex justify-content-end">
                        <a class="btn btn-danger" href="{{route('matter.list')}}">Cancelar</a>
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection