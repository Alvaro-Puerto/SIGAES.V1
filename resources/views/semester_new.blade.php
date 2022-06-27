@extends('layouts.app')

@section('content')

@include('users.partials.header', [
        'title' => '',
        'description' => 'Crear un semestre',
        'class' => 'col-lg-12 '
  ])   
<div class="container-fluid mt--7">
   <div class="row">
       <div class="col-8">
            <div class="card ">
                <div class="card-header">
                    <p class="font-weight-bold text-dark">
                        <span>
                            <i class="fa fa-plus text-primary"></i>
                        </span>
                        Nuevo semestre
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
                        <input type="text" name="school_year_id" class="form-control " id="school_year_id" hidden value="{{$id}}" >
                            <div class="form-group col-12">
                                <label for= "">Nombre del semestre<span class="font-weight-bold text-danger">*</span> </label>
                                <input type="text" name="name" class="form-control " id="name"  value="{{ old('name')}}">
                                @error('name')
                                    <small class="font-weight-bold text-danger">{{$message}}</small>
                                @enderror

                            </div>
                            <div class="form-group col-12">
                                <label for= "">Descripción del semestre<span class="font-weight-bold text-danger">*</span> </label>
                                <input type="text" name="description" class="form-control " id="description"  value="{{ old('description')}}">
                                @error('description')
                                    <small class="font-weight-bold text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for= "">Fecha inicio del semestre<span class="font-weight-bold text-danger">*</span> </label>
                                <input type="date" name="start_at" class="form-control " id="start_at"  value="{{ old('name')}}">
                                @error('start_at')
                                    <small class="font-weight-bold text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for= "">Fecha fin del semestre<span class="font-weight-bold text-danger">*</span> </label>
                                <input type="date" name="end_at" class="form-control " id="end_at"  value="{{ old('name')}}">
                                @error('end_at')
                                    <small class="font-weight-bold text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-12 d-flex justify-content-end">
                                <a  href="{{route('year.config', ['id'=>$id])}}" class="btn btn-danger">Cancelar</a>
                                <button class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
       </div>
       <div class="col-4">
           <div class="card">
               <div class="card-header">
                    <p class="font-weight-bold">
                        Informacion del ano lectivo
                    </p>
               </div>
               <div class="card-body">
                   <small>Ano lectivo</small>
                   <p class="font-weight-bold">
                       {{$year->name}}
                   </p>

                   <small>Duracion del ciclo</small>
                   <p class="font-weight-bold">
                        {{$year->start_at}} - {{$year->end_at}}
                   </p>
               </div>
               <div class="card-body">
                   
               </div>
           </div>
       </div>
   </div>
</div>
@endsection