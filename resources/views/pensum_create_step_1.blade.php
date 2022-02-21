@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid  mt-2">
   <div class="card mt-2">
        <div class="card-header">
            <p class="font-weight-bold">
              <span>
                <a href="{{route('year.list')}}">
                  <i class="fa fa-arrow-left text-success" aria-hidden="true"></i>
                </a>
              </span>
              Configuración del pensum
            </p>
            <div class="row">
              <div class="col-3">
                <small >Nombre del curso</small>
                <p class="font-weight-bold">{{$course->name}}</p>
              </div>
             
            </div>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col-4 bg-success text-center">
                    <span class="rounded-circle bg-white">
                        <h1 class="text-white">
                            1
                        </h1>
                    </span>
                    <p class="font-weight-bold text-white">
                         Crear pensum
                    </p>
                </div>
                <div class="col-4 bg-light text-center">
                    <span class="rounded-circle bg-white">
                        <h1 class="text-white">
                            2
                        </h1>
                    </span>
                    <p class="font-weight-bold text-white">
                        Asignar materias
                    </p>
                </div>
                <div class="col-4 bg-light text-center">
                    <span class="rounded-circle bg-white">
                        <h1 class="text-white">
                            3
                        </h1>
                    </span>
                    <p class="font-weight-bold text-white">
                        Finalizar
                    </p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="">Nombre del pensum</label>
                    <input type="text" name="name" id="" class="form-control rounded-0">
                </div>
                <div class="form-group">
                    <label for="">Anyo lectivo</label>
                    <select name="school_year_id" class="form-control rounded-0" id="">
                        @foreach ($school_years as $item)
                            <option value="">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group d-flex justify-content-end">
                    <a class="btn btn-danger text-white">
                        Cancelar
                    </a>
                    <button class="btn btn-success text-white">
                        Guardar y continuar
                    </button>
                </div>
            </form>
        </div>
   </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush