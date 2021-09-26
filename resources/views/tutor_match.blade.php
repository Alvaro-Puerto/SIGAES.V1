@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <div class="container-fluid mt-2">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 d-flex justify-content-end bg-white p-4">
           <form action="{{url('tutor/asign/student')}}" method="POST">
                @csrf
               <input type="hidden" name="id_student" value="{{$student->id}}">
               <input type="hidden" name="id_tutor" value="{{$tutor->id}}">
                <button type="submit" class="btn btn-success">
                    Confirmar nexo 
                </button>
           </form>
        </div>
        <div class="col-md-9 mt-2">
            <div class="card-deck">
                <div class="card">
                    <div class="card-header">
                        <p class="text-dark font-weight-bold">
                            Informacion del estudiante
                        </p>
                    </div>
                    <div class="card-body">
                        <small class="d-block">Codigo del estudiante.</small>
                        <p class="">{{$student->code}}</p>
                        <small class="d-block">Nombres completos.</small>
                        <p class="">{{$student->user->fullName()}}</p>
                        <small class="d-block">Email.</small>
                        <p class="">{{$student->user->email}}</p>
                        <small class="d-block">Fecha de nacimiento</small>
                        <p class="">{{$student->user->birth_date}}</p>
                        <small class="d-block">Sexo</small>
                        <p class="">{{$student->user->gender}}</p>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <p class="text-dark font-weight-bold">
                            Informacion del tutor
                        </p>
                    </div>
                    <div class="card-body">
                        <small class="d-block">Cedula de identidad.</small>
                        <p class="">{{$tutor->user->dni}}</p>
                        <small class="d-block">Nombres completos.</small>
                        <p class="">{{$tutor->user->fullName()}}</p>
                        <small class="d-block">Email.</small>
                        <p class="">{{$tutor->user->email}}</p>
                        <small class="d-block">Fecha de nacimiento</small>
                        <p class="">{{$tutor->user->birth_date}}</p>
                        <small class="d-block">Sexo</small>
                        <p class="">{{$tutor->user->gender}}</p>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
{{-- @include('layouts.footers.auth') --}}
@endsection