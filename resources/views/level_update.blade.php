@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
    <div class="container-fluid mt-2">
       <div class="card">
           <div class="card-header">
               <p class="font-weight-bold text-dark">
                  <span><i class="fas fa-pencil-alt text-warning fa-1x text-warning"></i></span>  Editar nivel</p>
           </div>
           <div class="card-body">
            <form method="POST" action="{{url('school/level')}}">
                @csrf
                <input type="hidden" name="id" id="id" hidden value="{{$level->id}}"> 
                <div class="form-group">
                    <label for="">
                        Nombre del programa/nivel <span class="font-weight-bold text-danger">*</span>
                    </label>
                    <input class="form-control rounded-0 border" name="name" id="name" value="{{$level->name}}">
                    @error('name')
                        <small class="font-weight-bold text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">
                        Descripción del programa/nivel <span class="font-weight-bold text-danger">*</span>
                    </label>
                    <input class="form-control rounded-0 border" name="description" id="description" value="{{$level->description}}">
                    @error('description')
                        <small class="font-weight-bold text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-end">
                    <a type="button" class="btn btn-danger" href="{{route('level.list')}}">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
               
            </form>
           </div>
       </div>
  
    </div>
@endsection

