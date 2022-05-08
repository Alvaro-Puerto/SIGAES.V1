@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="container-fluid  mt-2">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <p class="font-weight-bold">Finalizar configuracion del pensum</p>
            <button class="btn btn-link" onclick="printPage()">Imprimir</button>
            <a href="{{ route('course.pensum', ['id'=>$pensum->course->id]) }}">Finalizar proceso</a>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col-4 bg-light text-center">
                    <span class="rounded-circle bg-white">
                        <h1 class="text-white">
                            1
                        </h1>
                    </span>
                    <p class="font-weight-bold text-white">
                         Crear pensum
                    </p>
                </div>
                <div class="col-4 bg-light text-center">
                    <span class="rounded-circle bg-white">
                        <h1 class="text-white">
                            2
                        </h1>
                    </span>
                    <p class="font-weight-bold text-white">
                        Asignar materias
                    </p>
                </div>
                <div class="col-4 bg-success text-center">
                    <span class="rounded-circle bg-white">
                        <h1 class="text-white">
                            3
                        </h1>
                    </span>
                    <p class="font-weight-bold text-white">
                        Finalizar
                    </p>
                </div>
            </div>

        </div>
        <div id="container-print">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <small>Nombre del pensum</small>
                        <p>{{$pensum->nombre}}</p>
                    </div>
                    <div class="col">
                        <small>Grado</small>
                        <p>{{$pensum->course->name}}</p>
                    </div>
                    <div class="col">
                        <small>Ciclo lectivo</small>
                        <p>{{$pensum->school_year->name}}</p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @foreach($pensum->matter as $item)
                    <div class="row border">
                        <div class="col border-right d-flex align-items-center">
                            <p class="font-weight-bold mt-2">
                                {{$item->matter->name}}
                            </p>
                        </div>
                        <div class="col">
                            <ul class="list-group list-group-flush">
                                @foreach($item->teachers as $teacher)
                                    <li class="list-group-item">
                                        <small class="">{{$teacher->user->fullName()}}</small>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-footer">

            </div>
        </div>
        
    </div>
<div>
<script>
   function printPage() {
    var prtContent = document.getElementById("container-print");
    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    //WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.write('<html>'+
            + '<head>' +
            '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">'+
            +'</head>'+
            '<body>' +
            prtContent.innerHTML+
            '<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">'
            +'<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">'+
            '</body>' +
            '</html>'
        );
    WinPrint.document.close();
    WinPrint.focus();
    //WinPrint.print();
   // WinPrint.close();
   }
</script>
@endsection
@push('js')
    <script type="text/javascript" src="{{asset('assets/js/teacher.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/matter_pensum.js')}}"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
