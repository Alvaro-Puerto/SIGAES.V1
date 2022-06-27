@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid">
        <div class="row mt--5">
            <div class="col-6">
            <x-carousel-index></x-carousel-index>
            </div>
            <div class="col-6">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <p class="font-weight-bold text-dark">
                      Configuracion de slider
                    </p>
                    <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
                        Añadir imagen
                    </button>
                  </div>
                  <div class="card-body">
                    <x-setting-carousel></x-setting-carousel>
                  </div>
                </div>
               
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cambiar foto de perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" enctype="multipart/form-data" action="{{url('carousel/add')}}">
                @csrf
              
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="file" >
                        <label class="custom-file-label" for="customFile">Selecciona la nueva foto</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit"  class="btn btn-primary">Actualizar</button>   
                </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush