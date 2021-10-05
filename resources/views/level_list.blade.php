@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <div class="container-fluid mt-2">
      <div class="row mt-2">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0">Lista de los niveles/programas.</h3>
                <a href="{{route('level.new')}}" class="btn btn-primary" >
                    <span class="fa fa-plus text-white"> Añadir nuevo nivel/programa</span>
                </a>
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
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            
                            <a class="dropdown-item" href="{{ route('level.update', ['id'=>$level->id]) }}">
                              <span><i class="fas fa-pencil-alt textr-primary"></i></span>
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
             
            </div>
          </div>
        </div>
  
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{url('school/level')}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo nivel o programa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">
                            Nombre del programa/nivel
                        </label>
                        <input class="form-control rounded-0 border" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="">
                            Descripción del programa/nivel
                        </label>
                        <input class="form-control rounded-0 border" name="description" id="description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </form>
  </div>