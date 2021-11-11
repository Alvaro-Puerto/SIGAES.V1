<nav class="navbar navbar-vertical fixed-left navbar-expand-md bg-white " id="sidenav-main" >
    <div class="container-fluid">
        <!-- Toggler -->
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        {{-- <a class="navbar-brand font-weight-bold pt-0" href="{{ route('home') }}">
            SIGAES
        </a> --}}
        <h1 class="nav-link font-weight-bold">SIGAES</h1>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    {{-- <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a> --}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Cerrar sesión') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse  navbar-light mt--4" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header navbar-light d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav ">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Panel de control') }}
                    </a>
                </li>  --}}
                <li class="nav-item">
                    <a class="nav-link font-weight-bold text-primary-link border-bottom" style="color: #42526E" href="#navbar-examples-1" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples-1">                       
                        <span class="nav-link-text"  >{{ __('Alumnos') }}</span>
                    </a>
                    <div class="collapse " style="background-color: #F8F9FE" id="navbar-examples-1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('student.list') }}">
                                    {{ __('Listado de alumnos') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('student.create') }}">
                                    {{ __('Nuevos alumnos') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('user.index') }}">
                                    {{ __('Informes') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-bottom  font-weight-bold"  style="color: #42526E" href="#navbar-examples-2" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples-2">                       
                        <span class="nav-link-text" >{{ __('Maestros') }}</span>
                    </a>
                    <div class="collapse " style="background-color: #F8F9FE" id="navbar-examples-2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('teacher.all') }}">
                                    {{ __('Listado de maestros') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ url('teacher/new', []) }}">
                                    {{ __('Añadir maestro') }}
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('Informes') }}
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link   border-bottom  font-weight-bold" style="color: #42526E" href="#navbar-examples-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples-3">                        
                        <span class="nav-link-text" >{{ __('Configuración del centro') }}</span>
                    </a>

                    <div class="collapse " style="background-color: #F8F9FE" id="navbar-examples-3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('school.setting') }}">
                                    {{ __('Configuraciones generales del centro') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('level.list') }}">
                                    {{ __('Nivel/Programa') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('modality.list') }}">
                                    {{ __('Modalidad') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('school.courses') }}">
                                    {{ __('Grados') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('school.turns') }}">
                                    {{ __('Turnos') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('matter.list') }}">
                                    {{ __('Asignaturas') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="#">
                                    {{ __('Permisos y accesos') }}
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link  border-bottom  font-weight-bold" style="color: #42526E" href="#navbar-examples-10" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples-10">                        
                        <span class="nav-link-text"  >{{ __('Padres de familia') }}</span>
                    </a>
                    <div class="collapse " style="background-color: #F8F9FE" id="navbar-examples-10">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('tutor.list') }}">
                                    {{ __('Listado de tutores') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('tutor.create') }}">
                                    {{ __('Nuevo tutor') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('user.index') }}">
                                    {{ __('Informes') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link  border-bottom  font-weight-bold" style="color: #42526E" href="#navbar-examples-5" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples-5">                        
                        <span class="nav-link-text">{{ __('Curso lectivo') }}</span>
                    </a>
                    <div class="collapse " style="background-color: #F8F9FE" id="navbar-examples-5">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('year.list') }}">
                                    {{ __('Año lectivo') }}
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('student.create') }}">
                                    {{ __('Semetre') }}
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" href="{{ route('calendar') }}">
                                    {{ __('Horarios') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('icons') }}">
                        <i class="ni ni-planet text-blue"></i> {{ __('Icons') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('map') }}">
                        <i class="ni ni-pin-3 text-orange"></i> {{ __('Maps') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('table') }}">
                      <i class="ni ni-bullet-list-67 text-default"></i>
                      <span class="nav-link-text">Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 text-pink"></i> {{ __('Register') }}
                    </a>
                </li> --}}
                {{-- <li class="nav-item mb-5 mr-4 ml-4 pl-1 bg-danger" style="position: absolute; bottom: 0;">
                    <a class="nav-link text-white" href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        <i class="ni ni-cloud-download-95"></i> Upgrade to PRO
                    </a>
                </li> --}}
            </ul>
            <!-- Divider -->
           
            <!-- Navigation -->
            {{-- <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/getting-started/overview.html">
                        <i class="ni ni-spaceship"></i> Getting started
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/foundation/colors.html">
                        <i class="ni ni-palette"></i> Foundation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://argon-dashboard-laravel.creative-tim.com/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>
            </ul> --}}
        </div>
    </div>
</nav>
