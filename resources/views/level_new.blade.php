@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
    <div class="container-fluid mt-2">
       <div class="card">
           <div class="card-body">
            <form method="POST" action="{{url('school/level')}}">
                @csrf
                <div class="form-group">
                    <label for="">
                        Nombre del programa/nivel
                    </label>
                    <input class="form-control rounded-0 border" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="">
                        Descripción del programa/nivel
                    </label>
                    <input class="form-control rounded-0 border" name="description" id="description">
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


