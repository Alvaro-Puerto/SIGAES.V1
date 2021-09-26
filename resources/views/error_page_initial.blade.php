@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <div class="container-fluid mt-2">
      <div class="row mt-2 d-flex justify-content-center">
          <div class="col-6">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 d-flex justify-content-between">
                <h2 class="mb-0">
                    <span><i class="fas fa-exclamation-triangle text-danger mr-2"></i></span>
                    Hubo un error al procesar tu solicitud
                    <span><i class="fas fa-exclamation-triangle text-danger ml-2"></i></span>
                </h2>
              </div>
              <div class="card-body">
                  <p class="text-center">
                      No has configurado inicialmente los datos generales del centro de estudio donde se 
                      desea emplear esta aplicación, para continuar por favor configure los datos iniciales del centro
                      educativo.
                  </p>
              </div>
              <div class="card-footer text-center">
                    <a href="/school/setting" class="btn btn-success">Configurar centro</a>
              </div>
             
             
            </div>
          </div>
        </div>
  
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
