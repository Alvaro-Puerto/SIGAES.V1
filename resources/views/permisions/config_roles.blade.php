@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container-fluid mt-2">
    <input type="hidden" name="" id="role_id" value="{{$rol->id}}">
    
    <div class="card bg-secondary shadow">
        <div class="card-header">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Asignar permisos</a>
                </li>                         
                <li class="nav-item">
                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Usuarios asignados</a>
                </li>
            </ul>
        </div>
        <div class="card-body" style="min-height: 300px">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="card">
                        <div class="card-header">
                            <p class="font-weight-bold">{{$rol->name}}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <ul class="list-group">
                                       @foreach($rol->permissions as $permision)
                                        <a class="list-group-item " aria-current="true" onclick="removePermission( '{{ $permision->id }}' );" id="permission_asign_id_{{$permision->id}}">{{$permision->name}}</a>
                                       @endforeach
                                    </ul>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-outline-primary btn-block"> <<<  </button>
                                    <button class="btn btn-outline-primary btn-block" onclick="save()"> <  </button>
                                    <button class="btn btn-outline-primary btn-block" onclick="remove()"> >  </button>
                                    <button class="btn btn-outline-primary btn-block"> >>>  </button>
                                </div>
                                <div class="col-5">
                                <ul class="list-group">
                                    @foreach($permissions as $permision)
                                        <a class="list-group-item" onclick="assignPermission( '{{ $permision->id }}' );" id="permission_id_{{$permision->id}}" aria-current="true">{{$permision->name}}</a>
                                    @endforeach
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
               
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div class="card">
                        <div class="card-header d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                           Nuevo usuario
                        </button>
                        </div>
                        <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Username</th>
                                <th scope="col">Nombre completo</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rol->users as $user)
                                <tr>
                                        <th scope="row">
                                            {{$user->name}}
                                        </th>
                                        <th scope="row">
                                            {{$user->first_name }} {{$user->last_name}}
                                        </th>
                                        <th scope="row">
                                            {{$user->email }}
                                        </th>
                                        <th scope="row">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v text-primary"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form action="{{ route('roles.quit.user') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="role_id" value="{{$rol->id}}">
                                                        <input type="hidden" name="user" value="{{$user->id}}">
                                                        <button class="dropdown-item" href="{{ route('roles.show', ['id'=>$rol->id]) }}">
                                                            <span><i class="fa fa-times text-danger" aria-hidden="true"></i></span>
                                                            Remover rol
                                                        </button>
                                                    </form>
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
    </div>  
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buscar usuarios para asignar rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div classs="form-group">
                <input type="text" id="search" name="search" placeholder="Search" class="form-control" />
            </div>

            <div id="list"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="saveUserRol()">Guardar</button>
      </div>
    </div>
  </div>
</div>
@endsection



 
@push('js')
<script type="text/javascript" src="{{asset('assets/js/calendar.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/role.js')}}"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js">
    </script>
    <script type="text/javascript">
        var list_user = [];
        var route = "/search/all";
        $('#search').typeahead({
            source: function (query, process) {
                return $.get(route, {
                    query: query
                }, function (data) {
                    
                    return process(data);
                });
            }
        });

        $('#search').change(function() {
            var current = $('#search').typeahead("getActive");
        
            list_user.push(current);
            
            uniqueArray = list_user.filter(function(item, pos, self) {
                return self.indexOf(item) == pos;
            })

            list_user = uniqueArray;
            fillList();
        });

        function removeList(item) {
            console.log(item);
            list_user.splice(list_user.findIndex(i => i.id==item),1);
            fillList();
        }

        function fillList() {
            var el = document.getElementById('list');
            var str = '';
            for (const item of list_user) {
                console.log(item);
                str += `<span class="badge badge-success m-2">${item.first_name} ${item.last_name}    <span onclick="removeList(${item.id})"><i class="fa fa-times text-white" ></i></span> </span>`
            }

            el.innerHTML = str;
        }

        function saveUserRol() {
            const url = '/roles/user/add';
            let role = document.getElementById('role_id').value;
            let data = {
                'users': list_user,
                'role_id': role
            };

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then((response) => {
                return new Promise((resolve) => response.json()
                .then((message) => resolve({
                    status: response.status,
                    ok: response.ok,
                    message,
                })));
            }).then(({ status, message, ok }) => {
                console.log(status);
                console.log(message);
                console.log(ok); 
            })
        }

        function quitUserRol(id) {
            const url = '/roles/user/quit';
            let role = document.getElementById('role_id').value;
            let data = {
                'user': id,
                'role_id': role
            };

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then((response) => {
                return new Promise((resolve) => response.json()
                .then((message) => resolve({
                    status: response.status,
                    ok: response.ok,
                    message,
                })));
            }).then(({ status, message, ok }) => {
                console.log(status);
                console.log(message);
                console.log(ok); 
            })
        }
    </script>


@endpush
