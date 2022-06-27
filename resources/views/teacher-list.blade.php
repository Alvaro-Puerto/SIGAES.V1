@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <div class="container-fluid mt-2">
      <div class="row mt-2">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 ">
               
                <div class="row">
                  <div class="col-4">
                    <h3 class="mb-0">Lista de maestros</h3>
                  </div>
                  <div class="col-8 d-flex justify-content-end">
                    <a href= {{ url('teacher/export') }}  class="btn btn-link"><span class="fa fa-plus"></span> Exportar a excel</a>
                    <a href= {{ url('teacher/new', []) }}  class="btn btn-primary"><span class="fa fa-plus"></span> Nuevo maestro</a>
                  </div>
                </div>
              </div>
              <div class="card-header" id="">
                <form >
                  <meta name="_token" content="{{ csrf_token() }}">
                  <div class="form-row">
                    <div class="form-group col-3">
                      <label for="">Codigo</label>
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
              <div class="card-header d-flex justify-content-end">
                  {{$teachers->links()}}
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Codigo</th>
                      <th scope="col" class="sort" data-sort="status">Nombres</th>
                      <th scope="col" class="sort" data-sort="status">Apellidos</th>
                      <th scope="col" class="sort" data-sort="status">Telefono</th>
                      <th scope="col" class="sort" data-sort="status">Fecha de nacimiento</th>
                      <th scope="col" class="sort" data-sort="status">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($teachers as $teacher)
                    <tr>
                      <th scope="row">
                        {{$teacher->id}}
                      </th>
                      <th scope="row">
                        {{$teacher->inss}}
                      </th>
                      <th scope="row">
                        {{$teacher->user->first_name}}
                      </th>
                      <th scope="row">
                        {{$teacher->user->last_name}}
                      </th>
                      <th scope="row">
                        {{$teacher->user->phone}}
                      </th>
                      <th scope="row">
                        {{$teacher->user->birth_date}}
                      </th>

                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-primary"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('teacher.detail', ['id'=>$teacher->id]) }}"  >Ver detalles</a>
                         
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                   
                   
                  </tbody>
                </table>
              </div>
              <!-- Card footer -->
              <div class="card-footer py-4 d-flex justify-content-end">
                  {{$teachers->links()}}
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