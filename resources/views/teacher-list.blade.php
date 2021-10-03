@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <div class="container-fluid mt-2">
      <div class="row mt-2">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0">Lista de maestros</h3>
                <a href= {{ url('teacher/export') }}  class="btn btn-link"><span class="fa fa-plus"></span> Exportar a excel</a>
                <a href= {{ url('teacher/new', []) }}  class="btn btn-primary"><span class="fa fa-plus"></span> Nuevo maestro</a>
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
                    @foreach ($teacher as $teacher)
                    <tr>
                      <th scope="row">
                        {{$teacher->id}}
                      </th>
                      <th scope="row">
                        {{$teacher->code}}
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
              <div class="card-footer py-4">
                <nav aria-label="...">
                  <ul class="pagination justify-content-end mb-0">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">
                        <i class="fas fa-angle-left"></i>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <li class="page-item active">
                      <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">
                        <i class="fas fa-angle-right"></i>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
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