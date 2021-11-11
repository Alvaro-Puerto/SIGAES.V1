@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header  py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <div class="card shadow-lg">
                            <div class="card-header">
                                <h1>SIGAES</h1>
                                <small>Sistema de gestion academica</small>
                            </div>
                            <div class="card-body">

                            </div>
                            <div class="card-body">
                                <a href="{{ route('login') }}" class="btn btn-success">
                                    <i class="ni ni-key-25 text-success"></i>
                                    <span class="nav-link-inner--text">{{ __('Iniciar sesión') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
