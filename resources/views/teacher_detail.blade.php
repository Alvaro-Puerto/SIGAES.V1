@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt-2">
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
          <div class="card-body">
            
          </div>
        </div>
    </div>
</div>

@endsection

