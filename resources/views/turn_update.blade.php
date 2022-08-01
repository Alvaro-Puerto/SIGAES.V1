@extends('layouts.app')

@section('content')
@include('users.partials.header', [
        'title' => '',
        'description' => 'Editar turno',
        'class' => 'col-lg-12 '
  ])   
<div class="container-fluid mt--8">
    <div class="card ">
        <div class="card-header">
            <p class="font-weight-bold text-dark">
                <span><i class="fas fa-pencil-alt text-warning fa-1x text-warning"></i></span>
                Editar turno escolar
            </p>
        </div>
        <div class="card-body">
            <form  method="post" action="{{url('school/turn/new')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""></label>
                        <input type="text" name="school_information_id" class="form-control " id="" hidden>
                    </div>
                    <div class="form-group col-12">
                    
                        <input type="text" name="id" class="form-control " hidden id="" readonly value="{{$turn->id}}">
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Nombre del turno <span class="font-weight-bold text-danger">*</span> </label>
                        <input type="text" name="name" class="form-control " id="name"  value="{{$turn->name}}">
                        @error('name')
                            <small class="font-weight-bold text-danger">El nombre es requerido </small>
                        @enderror

                    </div>
                    <div class="form-group col-12 d-flex justify-content-end">
                        <a type="button" href="{{route('school.turns')}}" class="btn btn-danger">Cancelar</a>
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection