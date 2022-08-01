@extends('layouts.app')

@section('content')

@include('users.partials.header', [
        'title' => '',
        'description' => 'Panel para configurar la recurrencia de las sesiones',
        'class' => 'col-lg-12 '
  ])   

  <div class="container-fluid mt--7">
      <div class="row ">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0">Lista de las modalidades.</h3>
                <a href="{{route('modality.new')}}" class="btn btn-primary" >
                    <span class="fa fa-plus text-white"> Añadir nueva modalidad</span>
                </a>
              </div>
              <div class="card-header d-flex justify-content-end">
                {{$modalities->links()}}
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Nombre de la modalidad</th>
                      <th scope="col" class="sort" data-sort="status">Descripción de la modalidad</th>
                      <th scope="col" class="sort" data-sort="status">Fecha de creación</th>
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
                      <th scope="row">
                        {{$modality->created_at}}
                      </th>
                      <td class="text-cemter">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-primary"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            
                            <a class="dropdown-item" href="{{ route('modality.update', ['id'=> $modality->id]) }}">
                              <span><i class="fas fa-pencil-alt text-warning textr-primary"></i></span>
                              Editar
                            </a>
                            <form class="dropdown-item" action="{{ route('modality.delete', $modality->id)}}" method="post">
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
                {{$modalities->links()}}
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
