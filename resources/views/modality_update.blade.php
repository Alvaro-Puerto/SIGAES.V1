@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
    <div class="container-fluid mt-2">
       <div class="card">
           <div class="card-body">
            <form method="POST" action="{{url('school/modality')}}">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$modality->id}}">
                <div class="form-group">
                    <label for="">
                        Nombre de la modalidad
                    </label>
                    <input class="form-control rounded-0 border" required name="name" id="name" value="{{$modality->name}}">
                </div>
                <div class="form-group">
                    <label for="">
                        Descripción de la modalidad
                    </label>
                    <input class="form-control rounded-0 border" required name="description" id="description" value="{{$modality->description}}">
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
