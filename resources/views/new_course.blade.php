@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid">
    <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold">Nuevo curso</p>
        </div>
        <div class="card-body">
            <form  method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""></label>
                        <input type="text" name="school_information_id" class="form-control " id="" hidden>
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Id</label>
                        <input type="text" name="id" class="form-control " id="" disabled>
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Nombre del curso</label>
                        <input type="text" name="name" class="form-control " id="name" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="">Capacidad</label>
                        <input type="number" name="capacity" class="form-control" id="capacity" required>
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