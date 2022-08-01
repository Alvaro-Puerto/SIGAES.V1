<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->

        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css">


    </head>
    <body class="bg-white">
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12 d-flex mt-4 align-middle">
                    <x-logo-component/> <div class="mt-3"><x-information-school-component></x-information-school-component></div>
                </div>
                <div class="col-12 border-bottom d-flex justify-content-center">
                    <h1>Hoja de calificacion</h1>
                </div>
                <div class="col-12 mt-4">
                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <small class="d-block">Nombres completos</small>
                                    <p class="font-weight-bold">
                                        {{$enrollement->student->user->fullName()}}
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <small>Codigo de estudiante</small>
                                    <p class="font-weight-bold">
                                    {{$enrollement->student->code}}
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <small class="d-block">Sexo</small>
                                    <p class="font-weight-bold">
                                        {{$enrollement->student->user->gender}}
                                    </p>
                                </div>
                            
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <small class="d-block">Año lectivo</small>
                                    <p class="font-weight-bold">
                                        {{$enrollement->year->name}}
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <small>Grado lectivo</small>
                                    <p class="font-weight-bold">
                                       {{$enrollement->course->name}}
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <small class="d-block">Modalidad</small>
                                    <p class="font-weight-bold">
                                        {{$enrollement->modality->name}}
                                     </p>
                                </div>
                                <div class="col-md-3">
                                    <small class="d-block">Turno</small>
                                    <p class="font-weight-bold">
                                        {{$enrollement->turn->name}}
                                     </p>
                                </div>
                                <div class="col-md-3">
                                    <small class="d-block">Tipo de ingreso</small>
                                    <p class="font-weight-bold">
                                        {{$enrollement->type}}
                                    </p>
                                </div>
                                <div class="col-md-3">
                                    <small class="d-block">Repitente</small>
                                    @if ($enrollement->is_repeat)
                                        <span class="badge badge-danger">Repitente</span>    
                                    @else
                                        <span class="badge badge-success">No es repitente</span>    
                                    @endif                                                        
                                </div>
                                <div class="col-md-3">
                                    <small class="d-block">Fecha de matricula</small>
                                    <p class="font-weight-bold">
                                        {{$enrollement->created_at}}</p>                                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                {{--<div class="col-12">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-2">
        
                            </div>
                            @foreach ($year_school->semester as $item)
                            <div class="col-5">
                                <p class="font-weight-bold">{{$item->name}}</p>
                                <div class="row">
                                    @foreach ($item->partials as $partial)
                                        <div class="col">
                                            <small>{{$partial->name}}</small>
                                        </div>
                                    @endforeach
                                </div>
                            </div>     
                            @endforeach
                        </div>
                        <div class="card-body mt--2 ">
                            @foreach ($matter_and_partial as $item)
                                <div class="row ">
                                    <div class="col-2 p-2 d-flex justify-content-end border-bottom border-top">
                                        <small>{{$item->name_matter}}
                                            
                                        </small>
                                    </div>
                                    @foreach ($item->partials as $partial)
                                        <div class="col border text-center align-items-center justify-content-center">
                                            <p class="text-center">{{$partial->pivot->value}}</p>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> --}}
               <div class="col-12">
                   <div class="card border-top-0">
                       <div class="card-body">
                       <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="border-right">Asignaturas</th>
                                @foreach ($year_school->semester as $item)
                                    @foreach ($item->partials as $partial)
                                        <th class="border-right" scope="col "><small>{{$partial->name}}</small></th>
                                    @endforeach
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($matter_and_partial as $item)
                                <tr>
                                    <td class="d-flex justify-content-end border-right">
                                    <small>{{$item->name_matter}}
                                       
                                    </small>
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                       </div>
                   </div>
               </div>
                
            </div>

            <div class="row mt-7">
                <div class="col-6 mt-7 d-flex justify-content-center">
                    <p class="font-weight-bold">Elaborado por</p>
                </div>
                <div class="col-6 mt-7 d-flex justify-content-center">
                    <p class="font-weight-bold">Autorizado por</p>
                </div>
            </div>
        </div>

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('js')
        <script>
           window.addEventListener("load", function(event) {
                window.print();
            });
        </script>
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales-all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
        
    </body>
</html>

