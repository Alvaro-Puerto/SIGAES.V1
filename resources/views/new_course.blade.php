@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid">
    <div class="card mt--6">
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
                        <input type="text" name="name" class="form-control " id="name">
                    </div>
                    <div class="form-group col-6">
                        <label for="">Capacidad</label>
                        <input type="number" name="capacity" class="form-control" id=capacity"">
                    </div>
                    <div class="form-group col-12 d-flex justify-content-end">
                        <button class="btn btn-danger">Cancelar</button>
                        <button class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection