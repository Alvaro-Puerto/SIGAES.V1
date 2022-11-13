@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt-2 p-0">
    <input type="hidden" name="" id="user_id" value="{{$teacher->user->id}}">
    <div class="card">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-1">

                </div>
                <div class="col-2">
                    <small>Nombres completo</small>
                    <p class="font-weight-bold"> {{$teacher->user->fullName()}}</p>
                </div>
                <div class="col-3">
                    <small>Correo electronico</small>
                    <p class="font-weight-bold"> {{$teacher->user->email}}</p>
                </div>
                <div class="col-3">
                    <small>Identificacion</small>
                    <p class="font-weight-bold"> {{$teacher->inss}}</p>
                </div>
                <div class="col-3">
                    <small>Fecha de nacimiento</small>
                    <p class="font-weight-bold"> {{$teacher->user->birth_date}}</p>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="btn btn-link nav-link m-1 shadow-none active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Horarios</button>
                    <button class="btn btn-link nav-link m-1 shadow-none " id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Materias</button>
                    
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="card shadow-none border">
                            <div class="card-header d-flex justify-content-end ">

                                <div class="input-group w-50">
                                    <select class="form-control" id="ciclo" >
                                        @foreach($school_year as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-success" onclick="searchEvent()" type="button" id="button-addon2">Buscar</button>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-body">
                                <div id="calendar-detail"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">DDDDD</div>
                    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-link ">
                        <span><i class="fas fa-calculator text-success mr-2"></i></span>
                        Horarios
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                {{-- <img src="{{ url($teacher->user->picture) }}" alt="" title="" />
                                 --}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        {{-- <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Cambiar foto de perfil') }}</a> --}}
                        <button type="button" class="btn btn-sm btn-info mr-4" data-toggle="modal" data-target="#exampleModal">
                            Cambiar foto de perfil
                        </button>
                        {{-- <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a> --}}
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                               
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3>
                           {{$teacher->user->name}}
                        </h3>
                        <h3>
                            {{$teacher->inss}}
                         </h3>
                        <div class="h5 font-weight-300">
                            {{$teacher->user->birth_date}}
                        </div>
                        <div class="h5 font-weight-300">
                            {{$teacher->user->gender}}
                        </div>
                        <div class="h5 mt-4">
                            {{$teacher->user->email}}
                        </div>
                        
                        <hr class="my-4" />
                    <p>{{$teacher->general_observation}}</p>
                        <a href="#">{{ __('Show more') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card-header">
            <p class="font-weight-bold">
              Materias asignadas por pensum
            </p>
          </div>
          <div class="card-body bg-white">
            <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                        <th scope="col" class="sort" data-sort="name">Id</th>
                       
                        <th scope="col" class="sort" data-sort="">Ciclo lectivo</th>
                        <th scope="col" class="sort" data-sort="">Duracion</th>
                        <th scope="col" class="sort" data-sort="status">Acciones</th>
                        </tr>
                    </thead> 
                    <tbody class="list">
                        @foreach ($pensums as $pensum)
                        <tr>
                        <th scope="row">
                            {{$pensum->id}}
                        </th>
                       
                        <th>
                            {{$pensum->name}}
                        </th>
                        <th>
                            {{$pensum->start_at}} - {{$pensum->end_at}}
                        </th>
                        <th scope="row">
                            <a class="btn btn-link">
                                Ver detalles
                            </a>
                        </th>
                        </tr>
                        @endforeach
                    
                    
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
            {{$pensums->links()}}
          </div>
          </div>
          
    </div> -->
</div>

@endsection


@push('js')

<script type="text/javascript" src="{{asset('assets/js/teacher.js')}}"></script>
<script>
    
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar-detail');
    calendarGlobal = new FullCalendar.Calendar(calendarEl, {
      initialView: 'timeGridWeek',
      firstHour: 8
    });
    calendarGlobal.render();
    

    var sites = {!! json_encode($events->toArray(), JSON_HEX_TAG) !!};
    
    sites.forEach(event => {
        calendarGlobal.addEvent(event);
    });
  });

</script>
@endpush


