@extends('layouts.app')

@section('content')
@include('users.partials.header', [
        'title' => '',
        'description' => __(''),
        'class' => 'col-lg-7 '
    ])   
  <div class="container-fluid mt--7">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0 d-flex justify-content-between">
        <h3 class="mb-0">Lista de años lectivos</h3>
        <a class="btn btn-primary" href={{ url('school/year/new', []) }}>
            <span class="fa fa-plus text-white"> Añadir nuevo año lectivo</span>
        </a>
      </div>
      <div class="card-header d-flex justify-content-end">
        {{$years->links()}}
      </div>
      <!-- Light table -->
      <div class="card-body">
        <div class="">
          <table class="table align-items-center " style="min-height: 200px">
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
              @foreach ($years as $year)
              <tr>
                <th scope="row">
                  {{$year->id}}
                </th>
                <th scope="row">
                  {{$year->name}}
                </th>
                <th scope="row">
                  {{$year->description}}
                </th>
                <th scope="row">
                  {{$year->start_at}}
                </th>
                <th scope="row">
                  {{$year->end_at}}
                </th>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                       
                      <a class="dropdown-item" href="{{ route('year.config', ['id'=>$year->id]) }}">
                        <span><i class="fa fa-cogs text-success" aria-hidden="true"></i></span>
                        Configurar
                      </a>
                      <a class="dropdown-item" href="{{ route('year.update', ['id'=>$year->id]) }}">
                        <span><i class="fas fa-pencil-alt textr-primary"></i></span>
                        Editar
                      </a>
                      <form class="dropdown-item" action="{{ route('year.delete', $year->id)}}" method="post">
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
      </div>
      <!-- Card footer -->
      <div class="card-footer py-4 d-flex justify-content-end">
      {{$years->links()}}
      </div>
    </div>
  </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush