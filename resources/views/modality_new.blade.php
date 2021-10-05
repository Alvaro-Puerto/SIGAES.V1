@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
    <div class="container-fluid mt-2">
       <div class="card">
           <div class="card-body">
            <form method="POST" action="{{url('school/modality')}}">
                @csrf
                <div class="form-group">
                    <label for="">
                        Nombre de la modalidad
                    </label>
                    <input class="form-control rounded-0 border" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="">
                        Descripción de la modalidad
                    </label>
                    <input class="form-control rounded-0 border" name="description" id="description" required>
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
