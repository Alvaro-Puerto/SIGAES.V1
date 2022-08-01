@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold">
            <span><i class="fas fa-pencil-alt text-warning fa-1x text-warning"></i></span> Editar curso</p>
        </div>
        <div class="card-body">
            <form  method="post" action="{{route('school.course.new')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""></label>
                        <input type="text" name="school_information_id" class="form-control " id="" hidden value="{{$course->school_information_id}}">
                    </div>
                    <div class="form-group col-12">
                        <input type="hidden" name="id" id="id" value="{{$course->id}}">
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Nombre del curso <span class="font-weight-bold text-danger">*</span></label>
                        <input type="text" name="name" class="form-control " id="name"  value="{{$course->name}}">
                        @error('capacity')
                            <small class="font-weight-bold text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="">Capacidad <span class="font-weight-bold text-danger">*</span></label>
                        <input type="number" name="capacity" class="form-control" id="capacity"  value="{{$course->capacity}}">
                        @error('capacity')
                            <small class="font-weight-bold text-danger">
                                {{$message}}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group col-12 d-flex justify-content-end">
                        <a class="btn btn-danger"  href="{{route('school.courses')}}">Cancelar</a>
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection