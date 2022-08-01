@extends('layouts.app')

@section('content')
@include('users.partials.header', [
        'title' => '',
        'description' => 'Editar  recurrencia de sesion',
        'class' => 'col-lg-12 '
  ])   
    <div class="container-fluid mt--7">
       <div class="card">
            <div class="card-header">
               <p class="font-weight-bold text-dark">
                  <span><i class="fas fa-pencil-alt text-warning fa-1x text-warning"></i></span>  Editar modalidad</p>
           </div>
           <div class="card-body">
            <form method="POST" action="{{url('school/modality')}}">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$modality->id}}">
                <div class="form-group">
                    <label for="">
                        Nombre de la modalidad
                    </label>
                    <input class="form-control rounded-0 border"  name="name" id="name" value="{{$modality->name}}">
                    @error('name') 
                        <small class="font-weight-bold text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">
                        Descripción de la modalidad
                    </label>
                    <input class="form-control rounded-0 border"  name="description" id="description" value="{{$modality->description}}">
                    @error('description') 
                        <small class="font-weight-bold text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-end">
                    <a type="button" class="btn btn-danger" href="{{route('modality.list')}}">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
               
            </form>
           </div>
       </div>
  
    </div>
@endsection
