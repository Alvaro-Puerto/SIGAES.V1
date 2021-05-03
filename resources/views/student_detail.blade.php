@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                        <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
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
        <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
               <div class="card-header">
                <ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist">
                    <li class="nav-item mt-2">
                      <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Archivos</a>
                    </li>
                    <li class="nav-item mt-2">
                      <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">Referencias familiares</a>
                    </li>
                    <li class="nav-item mt-2">
                      <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3" aria-selected="false">Referencias externas</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-4-tab" data-toggle="tab" href="#tabs-text-4" role="tab" aria-controls="tabs-text-4" aria-selected="false">Reporte disciplinario</a>
                      </li>
                </ul>
               </div>
               <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-text-1" role="tab" aria-labelledby="tabs-text-1">
                        <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                        <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse.</p>
                    </div>
                    <div class="tab-pane fade" id="tabs-text-1" role="tab" aria-labelledby="tabs-text-1">
                        <p class="description">Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
                    </div>
                    <div class="tab-pane fade" id="tabs-text-1" role="tab" aria-labelledby="tabs-text-1">
                        <p class="description">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                    </div>
                </div>
            </div>
                
            </div>
        </div>
    </div>
    
    @include('layouts.footers.auth')
</div>
@endsection

