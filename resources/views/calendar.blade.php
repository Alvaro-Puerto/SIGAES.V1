
@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <style>
    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
  </style>
  <div class="container-fluid mt-2">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <p class="font-weight-bold">Horarios</p>
        <button class="btn btn-primary " id="myBtn">
          Nuevo evento
        </button>
      </div>
      <div class="card-header ">
        <div class="row">
          <div class="col-8">
            <form class="form">
              <div class="form-row">
                <div class="form-group col-5">
                  <label for="">Anyo lectivo</label>
                  <select name="school_year_id" class="form-control" id="school_year_id">
                    @foreach ($school_years as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach  
                  </select>        
                </div>
                <div class="form-group col-5">
                  <label for="">Curso lectivo</label>
                  <select name="course_id" class="form-control rounded-0" id="course_id">
                    @foreach ($courses as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>        
                </div>
                <div class="form-group col-2 pt-2">
                  <button class="btn btn-success mt-4" type="button" onclick="getEvent()">Buscar</button>
                </div>
              </div>
               
            </form>
          </div>
          <div class="col-4 d-flex justify-content-end">
           
          </div>
        </div>
      
        

      </div>
      <div class="card-body">
        <div id='calendar'></div>
      </div>
    </div>
  </div>

  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
       <div class="card">
         <div class="card-header">
           <p class="font-weight-bold">Nuevo horario</p>
         </div>
         <div class="card-body">
           <div class="form-row">
            <div class="form-group col">
              <label for="">Selecciona una materia</label>
              <select name="matter_id" id="matter_id" class="form-control rounded-0"></select>
            </div>
            
           </div>
           <div class="form-row">
                <div class="form-group col">
                  <label for="">Hora inicio</label>
                  <input type="datetime-local" class="form-control rounded-0">
                </div>
                <div class="form-group col">
                  <label for="">Hora Fin</label>
                  <input type="datetime-local" class="form-control rounded-0">
                </div>
                <div class="form-group col">
                  <label for="">Hora inicio</label>
                  <select name="" id="" multiple>
                    <option value="">Lunes</option>
                    <option value="">Martes</option>
                    <option value="">Miercoles</option>
                    <option value="">Jueves</option>
                    <option value="">Viernes</option>
                  </select>
                </div>

           </div>
         </div>
       </div>
    </div>
  
  </div>
@endsection

 
@push('js')
<script type="text/javascript" src="{{asset('assets/js/calendar.js')}}"></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth'
    });
    calendar.render();
  });

  // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
@endpush
