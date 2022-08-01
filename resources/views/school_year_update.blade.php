@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold text-dark">
            <span><i class="fas fa-pencil-alt text-warning fa-1x text-warning"></i></span>
            Editar año lectivo</p>
        </div>
      
        <div class="card-body mt--6">
            <form  method="post" action="{{url('school/year/new')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""></label>
                        <input type="text" name="school_information_id" class="form-control " value="{{$year->school_information_id}}" id="" hidden>
                    </div>
                    <div class="form-group col-12">
                        
                        <input type="number" name="id" class="form-control " id="id"  value="{{$year->id}}" hidden >
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Nombre del año lectivo <span class="font-weight-bold text-danger">*</span></label>
                        <input type="text" name="name" class="form-control " id="name" value="{{$year->name}}" >
                        @error('name')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Descripción del año lectivo <span class="font-weight-bold text-danger">*</span></label>
                        <input type="text" name="description" class="form-control " id="description" value="{{$year->description}}" >
                        @error('description')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Fecha inicio del plan vigente <span class="font-weight-bold text-danger">*</span></label>
                        <input type="date" name="start_at" class="form-control " id="start_at" value="{{$year->start_at}}" >
                        @error('start_at')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Fecha fin del plan vigente <span class="font-weight-bold text-danger">*</span></label>
                        <input type="date" name="end_at" class="form-control " id="end_at" value="{{$year->end_at}}" >
                        @error('end_at')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 d-flex justify-content-end">
                        <a class="btn btn-danger" href="{{route('year.list')}}">Cancelar</a>
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection