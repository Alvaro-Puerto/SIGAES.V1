@extends('layouts.app')

@section('content')

@include('users.partials.header', [
        'title' => '',
        'description' => __('Panel para configurar los niveles para cada curso escolar'),
        'class' => 'col-lg-12 '
    ])   

  <div class="container-fluid mt--8">
      <div class="row ">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0">Lista de los niveles/programas.</h3>
                <a href="{{route('level.new')}}" class="btn btn-primary" >
                    <span class="fa fa-plus text-white"> Añadir nuevo nivel/programa</span>
                </a>
              </div>
              <div class="card-header">
                {{$levels->links()}}
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Nombre del programa</th>
                      <th scope="col" class="sort" data-sort="status">Descripción del programa</th>
                      <th scope="col" class="sort" data-sort="status">Fecha de creación</th>
                      <th scope="col" class="sort" data-sort="status">Acciones</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($levels as $level)
                    <tr>
                      <th scope="row">
                        {{$level->id}}
                      </th>
                      <th scope="row">
                        {{$level->name}}
                      </th>
                      <th scope="row">
                        {{$level->description}}
                      </th>
                      <th scope="row">
                        {{$level->created_at}}
                      </th>
                      <td class="text-cemter">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-primary text-primary"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            
                            <a class="dropdown-item" href="{{ route('level.update', ['id'=>$level->id]) }}">
                              <span><i class="fas fa-pencil-alt text-warning text-warning"></i></span>
                              Editar
                            </a>
                            <form class="dropdown-item" action="{{ route('level.delete', $level->id)}}" method="post">
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
                {{$levels->links()}}
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
