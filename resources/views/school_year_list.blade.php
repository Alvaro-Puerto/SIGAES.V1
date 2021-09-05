@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <div class="container-fluid mt-2">
      <div class="row mt-2">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0">Lista de años lectivos</h3>
                <a class="btn btn-primary" href={{ url('school/year/new', []) }}>
                    <span class="fa fa-plus text-white"> Añadir nuevo año lectivo</span>
                </a>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Nombre del año lectivo</th>
                      <th scope="col" class="sort" data-sort="budget">Descripción del año lectivo</th>
                      <th scope="col" class="sort" data-sort="budget">Inicio del plan vigente</th>                    
                      <th scope="col" class="sort" data-sort="budget">Fin del plan vigente</th>                    
                      <th scope="col" class="sort" data-sort="budget">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($years as $student)
                    <tr>
                      <th scope="row">
                        {{$student->id}}
                      </th>
                      <th scope="row">
                        {{$student->name}}
                      </th>
                      <th scope="row">
                        {{$student->description}}
                      </th>
                      <th scope="row">
                        {{$student->start_at}}
                      </th>
                      <th scope="row">
                        {{$student->end_at}}
                      </th>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                             
                            <a class="dropdown-item" href="{{ route('year.config', ['id'=>$student->id]) }}">Configurar</a>
                            <a class="dropdown-item" href="#">Something else here</a>
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