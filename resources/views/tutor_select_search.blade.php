@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <div class="container-fluid mt-4">
    
    <div class="card">
      <div class="card-header">
        <p class="text-dark font-weight-bold">Busca el tutor para anexarlo a un estudiante</p>
      </div>
      <div class="card-header" id="search-student">
        <form >
          <meta name="_token" content="{{ csrf_token() }}">
          <div class="form-row">
            <div class="form-group col-3">
              <label for="">Cedula</label>
              <input class="form-control rounded-0 border" name="code" id="input-code">
            </div>
            <div class="form-group col-4">
              <label for="">Nombres</label>
              <input class="form-control rounded-0 border" name="first_name" id="input-name">
            </div>
            <div class="form-group col-4">
              <label for="">Apellidos</label>
              <input class="form-control rounded-0 border" name="last_name" id="input-last-name">
            </div>
            <div class="form-group col-1 pt-2">
              <button class="btn btn-warning mt-4" type="button" onclick="get_data_form()">
                Buscar
              </button>
            </div>
          </div>
        </form>
        
      </div>
      <div class="card-body">
          <div class="card-deck" id="tag-id">
              
          </div>
      </div>
     
    </div>
  </div>
{{-- @include('layouts.footers.auth') --}}
@endsection

<script type="text/javascript" src="{{asset('assets/js/tutor_search.js')}}"></script>