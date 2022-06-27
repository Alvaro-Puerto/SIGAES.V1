@extends('layouts.app', ['title' => __('Nuevo estudiante')])

@section('content')

    @include('users.partials.header', [
        'title' => '',
        'description' => __('Panel de configuracion del modulo estudiante'),
        'class' => 'col-lg-7 '
    ])   

    <div class="container mt--8">
        <div class="card">
            <div class="card-header">
                <p class="font-weight-bold">
                    Configuracion del modulo de estudiante
                </p>
            </div>
            <div class="card-body">
                <div class="form">
                    <div class="form-row">
                        <div class="form-group col-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection