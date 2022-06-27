@extends('layouts.app')

@section('content')
@include('users.partials.header', [
        'title' => '',
        'description' => __('Formulario para crear un nuevo ano lectivo'),
        'class' => 'col-lg-12 '
    ])   

    <div class="container-fluid mt--7">
        <div class="card ">
            <div class="card-header">
                <p class="font-weight-bold text-dark">
                    <span class="font-weight-bold text-primary"><i class="fa fa-plus"></i></span>
                    Nuevo año lectivo
                </p>
            </div>
        
            <div class="card-body mt--6">
                <form  method="post" action="{{url('school/year/new')}}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for= ""></label>
                            <input type="text" name="school_information_id" class="form-control " id="" hidden>
                        </div>
                        <div class="form-group col-12">
                        
                        </div>
                        <div class="form-group col-12">
                            <label for= "">Nombre del año lectivo <span class="font-weight-bold text-danger">*</span></label>
                            <input type="text" name="name" class="form-control " id="name" value="{{old('name')}}">
                            @error('name')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for= "">Descripción del año lectivo <span class="font-weight-bold text-danger">*</span></label>
                            <input type="text" name="description" class="form-control " id="description" value="{{old('description')}}">
                            @error('description')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for= "">Fecha inicio del plan vigente <span class="font-weight-bold text-danger">*</span></label>
                            <input type="date" name="start_at" class="form-control " id="start_at" value="{{old('start_at')}}">
                            @error('start_at')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for= "">Fecha fin del plan vigente <span class="font-weight-bold text-danger">*</span></label>
                            <input type="date" name="end_at" class="form-control " id="end_at" value="{{old('end_at')}}">
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