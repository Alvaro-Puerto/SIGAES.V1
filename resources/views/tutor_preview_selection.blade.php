@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <div class="container-fluid mt-7">
    
    <div class="card">
      <div class="card-header">
        <h3 class="font-weight-bold">Seleccione una opción</h3>
      </div>
      <div class="card-body d-flex justify-content-center">
        <a href="{{route('tutor.search', ["id" => $id])}}" class="btn btn-success">Seleccionar un tutor existente</a>
        <a href="{{route('tutor.create')}}" target="__blank" class="btn btn-warning">Crear un nuevo tutor</a>
      </div>
    </div>
  </div>
{{-- @include('layouts.footers.auth') --}}
@endsection