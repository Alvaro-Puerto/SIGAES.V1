@extends('layouts.app')

@section('content')
@include('users.partials.header', [
        'title' => '',
        'description' => 'Panel de configuracion de cursos',
        'class' => 'col-lg-12 '
  ])   
  <div class="container-fluid mt--7">
      <div class="row ">
          <div class="col">
            <div class="card">
              <!-- Card header -->
              <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0">Lista de los cursos</h3>
                <a class="btn btn-primary" href={{ url('school/courses/new', []) }}>
                    <span class="fa fa-plus text-white"> Añadir nuevo curso</span>
                </a>
              </div>
              <!-- Light table -->
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Id</th>
                      <th scope="col" class="sort" data-sort="budget">Nombre del curso</th>
                      <th scope="col" class="sort" data-sort="status">Capacidad</th>
                      <th scope="col" class="sort" data-sort="status">Fecha de creación</th>
                      <th scope="col" class="sort" data-sort="status">Acciones</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    @foreach ($courses as $course)
                    <tr>
                      <th scope="row">
                        {{$course->id}}
                      </th>
                      <th scope="row">
                        {{$course->name}}
                      </th>
                      <th scope="row">
                        {{$course->capacity}}
                      </th>
                      <th scope="row">
                        {{$course->created_at}}
                      </th>
                      <td class="text-cemter">
                        <div class="dropdown">
                          <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v text-primary"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="{{ route('course.pensum', ['id'=>$course->id]) }}">
                              <span><i class="fas fa-pencil-alt text-warning textr-primary"></i></span>
                              Ver pensum
                            </a>
                            <a class="dropdown-item" href="{{ route('school.course.update', ['id'=>$course->id]) }}">
                              <span><i class="fas fa-pencil-alt text-warning textr-primary"></i></span>
                              Editar
                            </a>
                            <form class="dropdown-item" action="{{ route('school.course.delete', $course->id)}}" method="post">
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
              <div class="card-footer d-flex justify-content-end">
                  {{$courses->links()}}
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