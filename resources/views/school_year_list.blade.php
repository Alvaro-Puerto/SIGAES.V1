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
      <div class="card-header border-0 ">
        <div class="row">
          <div class="col-4">
            <h3 class="mb-0">Lista de años lectivos</h3>
          </div>
          <div class="col-8 d-flex justify-content-end">
            <a class="btn btn-primary" href={{ url('school/year/new', []) }}>
              <span class="fa fa-plus text-white"> Añadir nuevo año lectivo</span>
            </a>
            
            
          </div>
        </div>

      </div>
      <div class="card-header d-flex justify-content-end">
        <div class="input-group w-50">
          <input type="text" class="form-control" id="query" placeholder="Buscar" aria-label="Recipient's username" aria-describedby="button-addon2">
          <div class="input-group-append">
              <button class="btn btn-warning" onclick="search()" type="button" id="button-addon2">Buscar</button>
          </div>
        </div>
      </div>
      <div class="card-header d-flex justify-content-end">
        {{$years->links()}}
      </div>
      <!-- Light table -->
      <div class="card-body">
        
          <table class="table align-items-center table-responsive" style="height: 500px;" >
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">Id</th>
                <th scope="col" class="sort" data-sort="budget">Nombre del año lectivo</th>
                <th scope="col" class="sort" data-sort="budget">Descripción del año lectivo</th>
                <th scope="col" class="sort" data-sort="budget">Inicio del plan vigente</th>                    
                <th scope="col" class="sort" data-sort="budget">Fin del plan vigente</th> 
                <th scope="col" class="sort" data-sort="budget">Estado</th>                    
                <th scope="col" class="sort" data-sort="budget">Acciones</th>
              </tr>
            </thead>
            <tbody class="list" id="tbody-search">
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
                <th scope="row">
                  @if($year->status)
                    <span class="badge badge-pill badge-success">Activo</span>
                  @else 
                  <span class="badge badge-pill badge-danger">Inactivo</span>
                  @endif
                </th>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v text-primary"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                      <a class="dropdown-item" href="{{ route('year.status', ['id'=>$year->id]) }}">
                        <span><i class="fas fa-success"></i></i></span>
                        Activar
                      </a>
                      <a class="dropdown-item" href="{{ route('year.status', ['id'=>$year->id]) }}">
                        <span><i class="fas fa-danger"></i></i></span>
                        Inactivar
                      </a>
                      <a class="dropdown-item" href="{{ route('year.config', ['id'=>$year->id]) }}">
                        <span><i class="fa fa-cogs text-success" aria-hidden="true"></i></span>
                        Configurar
                      </a>
                      <a class="dropdown-item" href="{{ route('year.update', ['id'=>$year->id]) }}">
                        <span><i class="fas fa-pencil-alt text-warning textr-primary"></i></span>
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
      <!-- Card footer -->
      <div class="card-footer py-4 d-flex justify-content-end">
      {{$years->links()}}
      </div>
    </div>
  </div>
@endsection

@push('js')
    <script src="{{asset('assets/js/school_year.js')}}"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush