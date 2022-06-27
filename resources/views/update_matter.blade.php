@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold text-dark">
                <span>
                    <i class="fas fa-pencil-alt fa-1x text-warning"></i>
                </span>
                Editar asignatura
            </p>
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
                        
                        <input type="text" name="id" class="form-control " id="" value="{{$matter->id}}" hidden>
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Nombre de la asignatura <span class="font-weight-bold text-danger"> *</span></label>
                        <input type="text" name="name" class="form-control " id="name"  value="{{$matter->name}}">
                        @error('name')
                            <small class="font-weight-bold text-danger">
                                El nombre es requerido
                            </small>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Descripción de la asignatura <span class="font-weight-bold text-danger"> *</span></label>
                        <input type="text" name="description" class="form-control " id="description" value="{{$matter->description}}">
                        @error('description')
                            <small class="font-weight-bold text-danger">
                                La descripcion es requerida
                            </small>
                        @enderror
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