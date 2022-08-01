@extends('layouts.app')

@section('content')
@include('users.partials.header', [
        'title' => '',
        'description' => 'Nueva asignatura',
        'class' => 'col-lg-12 '
  ])   
<div class="container-fluid mt--7">
    <div class="card ">
        <div class="card-header">
            <p class="font-weight-bold text-dark"> 
                <span>
                    <i class="fa fa-plus text-primary"></i>
                </span>
                Nueva asignatura
            </p>
        </div>
        <div class="card-body">
            <form  method="post" action="{{url('matter/new')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""></label>
                        <input type="text" name="school_information_id" class="form-control " id="" hidden>
                    </div>
                    <div class="form-group col-12">
                      
                        <input type="text" name="id" class="form-control " id="" hidden>
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Nombre de la asignatura <span class="font-weight-bold text-danger"> *</span></label>
                        <input type="text" name="name" class="form-control " id="name" value="{{ old('name')}}">
                        @error('name')
                            <small class="font-weight-bold text-danger">
                                El nombre es requerido
                            </small>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Descripción de la asignatura <span class="font-weight-bold text-danger"> *</span></label>
                        <input type="text" name="description" class="form-control " id="description" value="{{ old('description')}}">
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