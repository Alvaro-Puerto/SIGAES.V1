@extends('layouts.app', ['title' => __('Nuevo estudiante')])

@section('content')

    @include('users.partials.header', [
        'title' => '',
        'description' => __('Panel para editar un estudiante'),
        'class' => 'col-lg-12 '
    ])   

    <div class="container mt--7">
        <div class="card">
            <div class="card-header">
                <p class="font-weight-bold text-dark">
                <span><i class="fas fa-pencil-alt text-warning fa-1x text-warning"></i></span>
                    Editar estudiante
                </p>
            </div>
            <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{url('student/update/form')}}">
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="id" value="{{$student->id}}">
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-text-input" class="form-control-label">
                                Nombres <span class="font-weight-bold text-danger">*</span>
                            </label>
                            <input class="form-control" type="text" value="{{$student->user->first_name}}" id="first_name" name="first_name"  >
                            @error('first_name')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-search-input" class="form-control-label">
                                Apellidos <span class="font-weight-bold text-danger">*</span>
                            </label>
                            <input class="form-control" type="text" value="{{$student->user->last_name}}" id="last_name" name="last_name"  >
                            @error('last_name')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-search-input" class="form-control-label">
                                Email
                                <span class="font-weight-bold text-danger">*</span>
                            </label>
                            <input class="form-control" type="text"  id="email" name="email" value="{{ $student->user->email }}" readonly >
                            @error('email')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="">Foto de perfil</label>
                            <input type="file" class="custom-file-input mt-4" id="customFile" name="file" >
                            <label class="custom-file-label mt-4" for="customFile">Selecciona una foto de perfil</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-text-input" class="form-control-label">Sexo 
                            <span class="font-weight-bold text-danger">*</span>
                            </label>
                            <select  class="form-control " id="genre" name="gender"  >
                                <option value="Masculino">Masculino</option>
                                <option value="Masculino">Femenino</option>
                            </select>
                            @error('gender')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-search-input" class="form-control-label">Telefono 
                            
                            </label>
                            <input class="form-control" type="text" id="phone" name="phone" value="{{ $student->user->phone }}" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-text-input" class="form-control-label">Fecha de nacimiento 
                                <span class="font-weight-bold text-danger">*</span>
                            </label>
                            <input class="form-control" type="date" id="birth_date" name="birth_date" value="{{$student->user->birth_date}}" >
                            @error('birth_date')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror

                        </div>
                        <div class="form-group col-md-6 col-lg-6 col-xs-12">
                            <label for="example-search-input" class="form-control-label">Codigo del estudiante <span class="font-weight-bold text-danger">*</span></label>
                            <input class="form-control" type="text" id="code" name="code" value="{{$student->code}}" >
                            @error('code')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 form-group ">
                            <label for="example-search-input" class="form-control-label">Descripción general </label>
                            <textarea class="form-control border" id="general_observation" name="general_observation" >
                                {{$student->general_observation}}
                            </textarea>
                            @error('general_observation')
                                <small class="font-weight-bold text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 form-group d-flex justify-content-end">
                            <a href="/student" class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                    
                   
                </form>
            </div>
        </div>
    </div>
@endsection
