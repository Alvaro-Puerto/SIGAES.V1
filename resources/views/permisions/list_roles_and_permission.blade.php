@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt-2">
    <div class="card bg-secondary shadow">
        <div class="card-header">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Roles </a>
                </li>
                <!--<li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Reporte disciplinario</a>
                </li>-->
                <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Permisos </a>
                </li>
            </ul>
        </div>
        <div class="card-body" style="min-height: 300px">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <p class="font-weight-bold" >Roles</p>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                Nuevo
                            </button>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">Nombre del rol</th>
                                        <th scope="col" class="sort" data-sort="budget">Fecha creacion</th>
                                        <th scope="col" class="sort" data-sort="status">Permisos</th>
                                        <th scope="col" class="sort" data-sort="status">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($roles as $role)
                                    <tr>
                                        <th scope="row">
                                            {{$role->name}}
                                        </th>
                                        <th scope="row">
                                            {{$role->created_at}}
                                        </th>
                                        <th scope="row">
                                            
                                        </th>
                                        <th scope="row">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v text-primary"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('roles.show', ['id'=>$role->id]) }}">
                                                    <span><i class="fa fa-cogs text-success" aria-hidden="true"></i></span>
                                                    Asignar permisos
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                        </th>  
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
        
                    </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                </div>  
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="card">
                    <div class="card-header d-flex justify-content-end">


                    </div>
                    <div class="card-body">
                    <div class="card-deck">

                        <div class="card">
                        <div class="card-header">
                            <p class="text-dark font-weight-bold">
                                Informacion del tutor
                            </p>
                        </div>
                        <div class="card-body">

                        </div>
                        <div class="card-footer">

                        </div>
                        </div>

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
        <h5 class="modal-title" id="exampleModalLabel">Nuevo rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('roles.store')}}" method="POST" class="form">
          
          @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="">Nuevo rol <span class="font-weigth-bold text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection



 
@push('js')
<script type="text/javascript" src="{{asset('assets/js/calendar.js')}}"></script>

@endpush
