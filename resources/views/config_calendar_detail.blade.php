@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt-2">
    <div class="card">
      <div class="card-header ">
        
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-4">
            @if(isset($pensum))
            <input type="hidden" id="course_id" value="{{$pensum->course_id}}">
            <input type="hidden" id="school_year_id" value="{{$pensum->school_year_id}}">
            <p class="font-weight-bold">{{$pensum->nombre}}</p>
            <ul class="list-group">
              @foreach($pensum->matter as $matter)
                  <li class="list-group-item d-flex justify-content-between">
                   
                    {{$matter->matter->name}}
                    <button type="button" onclick="openModal('{{$matter}}')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Config
                    </button>
                  </li>
              @endforeach
            </ul>
            @else 
              <div class="d-flex justify-content-center alig-items-center">
                <a target="_blank" href="{{ route('course.pensum.new', ['id'=>$id]) }}" class="btn btn-success mt-7">Configurar pensum para este grado</a>
              </div>

            @endif
          </div>
          <div class="col-8">
          <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Button trigger modal -->


<!-- Modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Configurar horario por maestro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
          <div class="col-4">
              <div class="row">
                <div class="col-12">
                  <p class="fw-bold" id="matter"></p>
                </div>
                <div class="col-12">
                  <div class="list-group" id="list-teacher-li">
                  
                  </div>
                </div>
              </div>
              <div class="form" id="form-recurrent">
                 <form id="formRecurrent">
                    <div class="row">
                      @if(isset($pensum)) 
                      <input type="hidden" name="pensum_id" value="{{$pensum->id}}">
                      @endif
                      <input type="hidden" name="user_id" id="user_id">
                      <input type="hidden" name="matter_id" id="matter_id">

                      <div class="col-12">
                        <div class="form-group">
                          <label for="">Materia</label>
                          <input type="text" class="form-control" name="title" readonly id="title">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label for="">Maestro</label>
                          <input type="text" class="form-control" name="" id="name_user" disabled id="">
                        </div>
                      </div>
                      <div class="col-6">
                        
                        <div class="form-group">
                          <label for="">Fecha de inicio</label>
                        
                          <input type="datetime-local" name="dtstart" id="" class="form-control">
                        
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="">Fecha fin</label>
                          <input type="datetime-local" name="until" id="" class="form-control">
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="">Color</label>
                        <input type="color" name="color" class="form-control" id="">
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="">Dias <span class="fw-bold text-danger">*</span></label>
                          <select class="js-example-basic-multiple form-control" style="width: 100%;" name="freq[]" multiple="multiple">
                            <option value="1">Lunes</option>
                            <option value="2">Martes</option>
                            <option value="3">Miercoles</option>
                            <option value="4">Jueves</option>
                            <option value="5">Viernes</option>
                            <option value="6">Sabado</option>   
                            <option value="0">Domingo</option>   
                          
                          </select>
                        </div>
                      </div>
                      <div class="col-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger m-1" onclick="showForm()">Cancelar</button>
                        <button type="button" class="btn btn-success m-1" onclick="save()">Aplicar </button>
                        

                      </div>
                    </div>
                 </form>
              </div>
          </div>
          <div class="col-8">
            <div id="calendar-modal"></div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>
@endsection




 
@push('js')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>

  var events = [];
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });

  function getEventAll() {
    var event = [];
    
    console.log(event);
    return event;
  }


  document.addEventListener('DOMContentLoaded', function() {
    matterG: any = null;
    var calendarGlobal = null;
    
   
    var calendarConfigu = null;
    var calendarEl = document.getElementById('calendar');
    var calendarGlobal = new FullCalendar.Calendar(calendarEl, {
      initialView: 'timeGridWeek',
    });
    calendarGlobal.render();

    
    let couse_id = document.getElementById('course_id').value;
    let school_year_id = document.getElementById('school_year_id').value;

    fetch('/calendar/' + couse_id + '/' + school_year_id, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(res => res.json())
    .catch(error => console.log(error))
    .then(res => {
       res.forEach(event => {
         event.title = event.title + ' ' + event.users[0].first_name + ' ' + event.users[0].last_name
         calendarGlobal.addEvent(event)}
       );
    })


  });

  function openModal(matter) {
    matterG = JSON.parse(matter);
    console.log(matter)
  
    fetch('/course/pensum/matter/' + matterG.id, {
      method: 'GET'
    }).then(res => res.json())
    .then(res => {
      let str = '';
      for (const item of res) {
        str +=   `
        <a href="#" 
            class="list-group-item list-group-item-action" 
            >
             <div class="row">
                <input type="hidden" id="user_name" value="${ item.first_name  + ' ' +  item.last_name }">
                <input type="hidden" id="id_user" value="${ item.id }">
                <div class="col">
                  ${ item.first_name  + ' ' +  item.last_name }
                </div>
                <div class="col d-flex justify-content-end">
                  <button class="btn btn-link  p-0" ><span><i class="fas fa-eye"></i></span></button>
                  <button class="btn btn-link p-0" onclick="showForm()"><span><i class="fas fa-plus"></i></span></button>
                </div>
             </div>
              
        </a>
        `
      }

      document.getElementById('list-teacher-li').innerHTML = '';
      document.getElementById('list-teacher-li').innerHTML = str;
      document.getElementById('title').innerHTML = matterG.matter.name;
    }).catch(err => {
      console.log(err)
    });


    var calendarEl = document.getElementById('calendar-modal');
    calendarConfig = new FullCalendar.Calendar(calendarEl, {
      initialView: 'timeGridWeek',
      height: 450
    });
    calendarConfig.render();
  }
</script>
<script type="text/javascript" src="{{asset('assets/js/calendar.js')}}"></script>
@endpush
