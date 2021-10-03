@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <small class="d-block">
                        Materia a calificar
                    </small>
                    <p class="font-weight-bold">
                        {{$matter->name}}
                    </p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <p class="font-weight-bold text-dark">
                                Evaluaciones
                            </p>
                            <p class="font-weigth-bold">
                                Calificación
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($enrollement_matter->partials as $item)
                            <div class="col-6 border-bottom">
                                <p>{{$item->name}}</p>
                            </div>
                            @if ($item->pivot->value)
                            <div class="col-6 border-bottom">
                                <p>{{$item->pivot->value}}</p>
                            </div>
                            @else
                            <div class="col-6">
                                <form action="{{route('matter.partial.asign')}}"  method="POST" class="form-inline">
                                    @csrf
                                    <input type="hidden" name="id_matter" value="{{$enrollement_matter->id}}">
                                    <input type="hidden" name="id_partial" value="{{$item->id}}">
                                    <input type="number" class="form-control rounded-0 " name="value">
                                    <button class="btn btn-link">Confirmar</button>
                                    
                                </form>
                            </div>
                            
                            @endif
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-4">
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
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection