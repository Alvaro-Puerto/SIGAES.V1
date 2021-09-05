@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <div class="container-fluid mt-2">
      <div class="row mt-2">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0">Lista de las modalidades.</h3>
                <button  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <span class="fa fa-plus text-white"> Añadir nueva modalidad</span>
                </button>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Nombre de la modalidad</th>
                      <th scope="col" class="sort" data-sort="status">Descripción de la modalidad</th>
                      <th scope="col" class="sort" data-sort="status">Acciones</th>
                      <th scope="col" class="sort" data-sort="status"></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($modalities as $modality)
                    <tr>
                      <th scope="row">
                        {{$modality->id}}
                      </th>
                      <th scope="row">
                        {{$modality->name}}
                      </th>
                      <th scope="row">
                        {{$modality->description}}
                      </th>
                      <td class="text-cemter">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="#">Ver detalles</a>
                            
                            <a class="dropdown-item" href="#">Editar</a>
                          </div>
                        </div>
                        
                      </td>
                      <td>
                        <form action="{{ route('modality.delete', $modality->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
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
    <form method="POST" action="{{url('school/modality')}}">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva modalidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">
                            Nombre de la modalidad
                        </label>
                        <input class="form-control rounded-0 border" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="">
                            Descripción de la modalidad
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