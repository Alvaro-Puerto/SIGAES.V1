@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <div class="container-fluid mt-2">
      <div class="row mt-2">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0">Lista de los turnos</h3>
                <a class="btn btn-primary" href={{ url('school/turn/new', []) }}>
                    <span class="fa fa-plus text-white"> Añadir nuevo turno</span>
                </a>
              </div>
              <div class="card-header d-flex justify-content-end">
                {{$turns->links()}}
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Nombre del turno</th>
                      <th scope="col" class="sort" data-sort="budget">Fecha de creación</th>
                      <th scope="col" class="sort text-center" data-sort="budget">Acciones</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($turns as $turn)
                    <tr>
                      <th scope="row">
                        {{$turn->id}}
                      </th>
                      <th scope="row">
                        {{$turn->name}}
                      </th>
                     
                      <th scope="row">
                        {{$turn->created_at}}
                      </th>
                      <td class="text-center">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            
                            <a class="dropdown-item" href="{{ route('school.turn.update', ['id'=> $turn->id]) }}">
                              <span><i class="fas fa-pencil-alt textr-primary"></i></span>
                              Editar
                            </a>
                            <form class="dropdown-item" action="{{ route('school.turn.delete', $turn->id)}}" method="post">
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
                {{$turns->links()}}
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