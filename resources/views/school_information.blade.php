@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
    <div class="container-fluid mt--6">
        {{-- <div class="card">
            @if($errors->has())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif
        </div> --}}
      <div class="card p-4">
        <form  method="POST" action="{{url('school/create')}}" >
            @csrf
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="">Id</label>
                <input type="text" class="form-control" name="id" id="id" value="{{$school->id}}" disabled>
                </div>
                <div class="form-group col-6">
                    <label for="">Nombre del centro</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$school->name}}">
                </div>
                <div class="form-group col-6">
                    <label for="">Codigo unico del establecimiento</label>
                <input type="text" class="form-control" name="code" id="code"  value="{{$school->code}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="">Dirección del centro</label>
                <input type="text" class="form-control" name="address" id="address"  value="{{$school->address}}">
                </div>
                <div class="form-group col-6">
                    <label for="">Ciudad</label>
                <input type="text" class="form-control" name="city" id="city" value="{{$school->city}}">
                </div>
                <div class="form-group col-6">
                    <label for="">Municipio</label>
                <input type="text" class="form-control" name="municipality" id="municipality" value="{{$school->municipality}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group d-flex justify-content-end">
                    <button class="btn btn-danger">Cancelar</button>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </div>
            </div>
  
          </form>
      </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush