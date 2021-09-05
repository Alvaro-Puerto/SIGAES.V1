@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <p class="font-weight-bold">Nueva matricula</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route ('enrollement.create')}}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="">Nivel/Programa 
                                    <span class="text-danger">*
                                        <a  href="{{ route('level.list')}}" target="_blank" rel="noopener noreferrer">
                                            <span><i class="fa fa-plus text-success ml-2 " aria-hidden="true"></i></span>
                                        </a>
                                    </span>
                                </label>
                                <select class="form-control rounded-0" name="level_id" id="level_id">
                                    @foreach ($levels as $level)
                                    <option value={{$level->id}}>{{$level->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Modalidad 
                                    <span class="text-danger">*
                                        <a  href="{{ route('modality.list')}}" target="_blank" rel="noopener noreferrer">
                                            <span><i class="fa fa-plus text-success ml-2 " aria-hidden="true"></i></span>
                                        </a>
                                    </span>
                                </label>
                                <select class="form-control rounded-0" name="modality_id" id="modality_id">
                                    @foreach ($modalities as $modality)
                                    <option value={{$modality->id}}>{{$modality->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="">Turno 
                                    <span class="text-danger">*
                                        <a  href="{{ route('school.turns.new')}}" target="_blank" rel="noopener noreferrer">
                                            <span><i class="fa fa-plus text-success ml-2 " aria-hidden="true"></i></span>
                                        </a>
                                    </span>
                                </label>
                                <select class="form-control rounded-0" name="turn_id" id="turn_id">
                                    @foreach ($turns as $turn)
                                        <option value={{$turn->id}}>{{$turn->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Tipo de matricula <span class="text-danger">*</span></label>
                                <select class="form-control rounded-0" name="type" id="type">
                                    <option value="Estudiante activo">Estudiante activo</option>
                                    <option value="Nuevo Ingreso">Nuevo Ingreso</option>
                                    <option value="Traslado de colegio">Traslado de colegio</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="">Grado/Ciclo
                                    <span class="text-danger">*
                                        <a  href="{{ route('school.courses.new')}}" target="_blank" rel="noopener noreferrer">
                                            <span><i class="fa fa-plus text-success ml-2 " aria-hidden="true"></i></span>
                                        </a>
                                    </span>
                                </label>
                                <select class="form-control" id="course_id" name="course_id">
                                    @foreach ($grades as $grade)
                                        <option value={{$grade->id}}>{{$grade->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Año lectivo
                                    <span class="text-danger">*
                                        <a  href="{{ route('school.year.new')}}" target="_blank" rel="noopener noreferrer">
                                            <span><i class="fa fa-plus text-success ml-2 " aria-hidden="true"></i></span>
                                        </a>
                                    </span>
                                </label>
                                <select class="form-control" id="school_year_id" name="school_year_id">
                                    @foreach ($years as $year)
                                        <option value={{$year->id}}>{{$year->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="" class="d-block">El estudiante es repitente <span class="text-danger">*</span></label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" onclick="isRepeat()" name="is_repeat" id="repeat" value="true">
                                    <label class="form-check-label" for="inlineRadio1">Si</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" onclick="resetForm()" name="is_repeat" id="inlineRadio2" value="false" checked>
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                              
                            </div>
                        </div>
                        <div class="form-row" id="container-repeat">
                            <div class="form-group col-4">
                                <label for="">Cuantas veces</label>
                                <input type="number" class="form-control rounded-0 border" min="1" id="count_repeat" name="count_repeat">
                            </div>
                            <div class="col-8 form-group">
                                <label for="">Escribe el motivo</label>
                                <textarea class="rounded-0 border form-control " id="reason" name="reason_repeat"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="">Observaciones especiales o notas</label>
                                <textarea class="rounded-0 border " name="general_observation" style="width: 100%; height: 150px" ></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="student_id" value={{$id}}>
                        <div class="form-row d-flex justify-content-end mt-4">
                            <a  href="{{ route('student.detail', ['id'=>$id]) }}"  class="btn btn-danger">Cancelar</a>
                            <button class="btn btn-success">Crear matricula</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            @if ($student->user->picture)
                            <a href="#">
                              <img src="{{ url($student->user->picture) }}" alt="" title="" />
                            </a>      
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        {{-- <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Cambiar foto de perfil') }}</a> --}}
                        
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
                          {{$student->user->name}}
                        </h3>
                        <h3>
                            {{$student->code}}
                        </h3>
                        <div class="h5 font-weight-300">
                            {{$student->user->birth_date}}
                        </div>
                        <div class="h5 font-weight-300">
                            {{$student->user->gender}}
                        </div>
                        <div class="h5 mt-4">
                            {{$student->user->email}}
                        </div>
                        
                        <hr class="my-4" />
                    <p>{{$student->general_observation}}</p>
                        <a href="#">{{ __('Show more') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection


<script type="text/javascript" src="{{asset('assets/js/enrollement_validation.js')}}"></script>