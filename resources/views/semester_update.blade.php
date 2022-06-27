@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid ">
    <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold text-dark">
            <span><i class="fas fa-pencil-alt fa-1x text-warning"></i></span>
                Editar semestre
            </p>
            @if($errors->any())
        
            <div class="card-header">
                <div class="alert alert-danger" role="alert">
                    {{$errors->first()}}
                </div>
            </div>
        @endif
        </div>
        <div class="card-body">
            <form  method="post" action="{{url('school/semester/new')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""><span class="font-weight-bold text-danger">*</span> </label>
                    <input type="text" name="school_year_id" class="form-control " id="school_year_id" hidden value="{{$semester->school_year_id}}" >
                    </div>
                    <div class="form-group col-12">
                       
                        <input type="text" name="id" class="form-control " hidden id="id" value="{{$semester->id}}" readonly >
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Nombre del semestre<span class="font-weight-bold text-danger">*</span> </label>
                        <input type="text" name="name" class="form-control " id="name" required value="{{$semester->name}}">
                        @error('name')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                        @enderror

                    </div>
                    <div class="form-group col-12">
                        <label for= "">Descripción del semestre<span class="font-weight-bold text-danger">*</span> </label>
                        <input type="text" name="description" class="form-control " id="description" required value="{{$semester->description}}">
                        @error('description')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Fecha inicio del semestre<span class="font-weight-bold text-danger">*</span> </label>
                        <input type="date" name="start_at" class="form-control " id="start_at" required value="{{$semester->start_at}}">
                        @error('start_at')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Fecha fin del semestre<span class="font-weight-bold text-danger">*</span> </label>
                        <input type="date" name="end_at" class="form-control " id="end_at" required value="{{$semester->end_at}}">
                        @error('end_at')
                            <small class="font-weight-bold text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 d-flex justify-content-end">
                        <a  href="{{route('year.config', ['id'=>$semester->school_year_id ])}}" class="btn btn-danger">Cancelar</a>
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection