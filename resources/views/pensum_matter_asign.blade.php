@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid  mt-2">
    <input type="hidden" value="{{$id_pensum}}" id="id_pensum_id">
    <div class="card">
        <div class="card-header">
            <p class="font-weight-bold ">Seleccione materias a asignar</p>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col-4 bg-light text-center">
                    <span class="rounded-circle bg-white">
                        <h1 class="text-white">
                            1
                        </h1>
                    </span>
                    <p class="font-weight-bold text-white">
                         Crear pensum
                    </p>
                </div>
                <div class="col-4 bg-success text-center">
                    <span class="rounded-circle bg-white">
                        <h1 class="text-white">
                            2
                        </h1>
                    </span>
                    <p class="font-weight-bold text-white">
                        Asignar materias
                    </p>
                </div>
                <div class="col-4 bg-light text-center">
                    <span class="rounded-circle bg-white">
                        <h1 class="text-white">
                            3
                        </h1>
                    </span>
                    <p class="font-weight-bold text-white">
                        Finalizar
                    </p>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="row bg-white">
                <div class="col-6 bg-light" style="min-height: 400px; max-height: 500px; overflow-y: scroll;
                ">
                   <div class=" row d-flex justify-content-center">
                    @foreach ($matters as $item)
                        <div class="card col-5 m-2">
                            <div class="card-body">
                                <p class="text-center font-weight-bold">{{$item->name}}</p>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-link" data-toggle="modal"  onclick="addPensumTeacher('{{$item->id}}')" data-target="#exampleModal">
                                    <span class=" d-block"><i class="fa fa-plus text-success"></i></span>
                                    Seleccionar
                                </button>
                            </div>
                        </div>
                    @endforeach
                   </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <p class="font-weight-bold">Materias adjuntadas</p>
                            <a href="{{ route('course.pensum.finish', ['id'=>$pensum->id]) }}" class="btn btn-success">Finalizar</a>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush" >
                            @foreach($pensum->matter as $item)
                                <li class="list-group-item p-0">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-between">
                                            <p class="font-weight-bold"> {{$item->matter->name}}</p>
                                            <form action='/course/pensum/matter/detach' method="POST">
                                                @csrf
                                                <input type="hidden" name="matter_id" value="{{$item->matter->id}}">
                                                <input type="hidden" name="pensum_id" value="{{$pensum->id}}">
                                                <button class="btn btn-link">
                                                    <span class="fa fa-times text-danger"></span>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-12">
                                            <ul class="list-group" >
                                                @foreach($item->teachers as $teacher)
                                                    <li class="list-group-item p-1 d-flex justify-content-between">
                                                        <small>{{$teacher->user->fullName()}}</small>
                                                        <form action='/course/pensum/matter/teacher/detach' method="POST">
                                                            @csrf
                                                            <input type="hidden" name="matter_pensum_id" value="{{$item->id}}">
                                                            <input type="hidden" name="teacher_id" value="{{$teacher->id}}">
                                                            <button class="btn btn-link">
                                                                <span class="fa fa-times text-danger"></span>
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</div>

<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Anexar maestro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card-header" id="">
            <p class="font-weight-bold text-danger" id="alert-header"></p>
        </div>
        <div class="modal-body">
           <div class="form">
            <input type="hidden" name="matter_id" id="matter_id">   
            <input type="hidden" name="pensum_id" id="pensum_id">
               <div class="form-group">
                   <label for="">Seleccione el maestro a asociar</label>
                   <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Ingrese el nombre" id="search-teacher">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="" onclick="search()">Buscar</button>
                        </div>
                    </div>
               </div>
           </div>
            <ul class="list-group" id="list-teacher">
               
            </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" onclick="saveAddTeacher()">Guardar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

<script type="text/javascript">
    window.CSRF_TOKEN = '{{ csrf_token() }}';
</script>
@push('js')
    <script type="text/javascript" src="{{asset('assets/js/teacher.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/matter_pensum.js')}}"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush

