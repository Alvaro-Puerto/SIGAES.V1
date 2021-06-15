@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt--6 ">
    <div class="card mt--6">
        <div class="card-header">
            <p class="font-weight-bold">Nuevo semestre</p>
        </div>
        <div class="card-body">
            <form  method="post" action="{{url('school/semester/new')}}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for= ""></label>
                    <input type="text" name="school_year_id" class="form-control " id="school_year_id" hidden value="{{$id}}">
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Id</label>
                        <input type="text" name="id" class="form-control " id="" disabled>
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Nombre del semestre</label>
                        <input type="text" name="name" class="form-control " id="name">
                    </div>
                    <div class="form-group col-12">
                        <label for= "">Descripción del semestre</label>
                        <input type="text" name="description" class="form-control " id="description">
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Fecha inicio del semestre</label>
                        <input type="date" name="start_at" class="form-control " id="start_at">
                    </div>
                    <div class="form-group col-6">
                        <label for= "">Fecha fin del semestre</label>
                        <input type="date" name="end_at" class="form-control " id="end_at">
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