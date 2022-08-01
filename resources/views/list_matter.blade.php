@extends('layouts.app')

@section('content')
@include('users.partials.header', [
        'title' => '',
        'description' => 'Todas las asignaturas',
        'class' => 'col-lg-12 '
  ])   
  <div class="container-fluid mt--8">
      <div class="row ">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0">Lista de todas las asignaturas</h3>
                <a class="btn btn-primary" href={{ url('matter/new', []) }}>
                    <span class="fa fa-plus text-white"> Añadir nueva asignatura</span>
                </a>
              </div>
              <div class="card-header d-flex justify-content-end">
                {{$matters->links()}}
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Nombre de la asignatura</th>
                      <th scope="col" class="sort" data-sort="budget">Descripción de la asignatura</th>
                      <th scope="col" class="sort" data-sort="budget">Fecha de creación</th>
                      <th scope="col" class="sort" data-sort="status">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($matters as $matter)
                    <tr>
                      <th scope="row">
                        {{$matter->id}}
                      </th>
                      <th scope="row">
                        {{$matter->name}}
                      </th>
                      <th scope="row">
                        {{$matter->description}}
                      </th>
                      <th scope="row">
                        {{$matter->created_at}}
                      </th>
                      <td class="text-right">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-primary"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('matter.detail', ['id'=>$matter->id]) }}">
                              <span><i class="fa fa-cogs text-success" aria-hidden="true"></i></span>
                              Configurar
                            </a>
                            <a class="dropdown-item" href="{{ route('matter.update', ['id'=>$matter->id]) }}">
                              <span><i class="fas fa-pencil-alt text-warning textr-primary"></i></span>
                              Editar
                            </a>
                            <form class="dropdown-item" action="{{ route('matter.delete', $matter->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-link m-0 p-0 text-dark" type="submit">
                                <span><i class="fa fa-times text-danger" aria-hidden="true"></i></span>
                                 Eliminar
                              </button>
                            </form>
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
                {{$matters->links()}}
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