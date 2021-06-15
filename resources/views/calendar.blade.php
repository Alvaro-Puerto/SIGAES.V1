
@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
  <div class="container-fluid mt-6">

    <div id="menu">
        <span id="menu-navi">
          <button type="button" class="btn btn-default btn-sm move-today" data-action="move-today">Today</button>
          <button type="button" class="btn btn-default btn-sm move-day" data-action="move-prev">
            <i class="calendar-icon ic-arrow-line-left" data-action="move-prev"></i>
          </button>
          <button type="button" class="btn btn-default btn-sm move-day" data-action="move-next">
            <i class="calendar-icon ic-arrow-line-right" data-action="move-next"></i>
          </button>
        </span>
        <span id="renderRange" class="render-range"></span>
      </div>
  
      <div id="calendar"></div>
    
  </div>
@endsection

{{-- <script type="text/javascript" src="{{asset('assets/js/tui-calendar.js')}}"></script> --}}
{{-- <script type="text/javascript" src="{{asset('assets/js/tui-code-snippet.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/tui-date-picker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/tui-time-picker.min.js')}}"></script>
 --}}
 {{-- <script type="text/javascript" src="{{asset('assets/js/require.js')}}"></script> --}}
 <script type="text/javascript" src="{{asset('assets/js/calendar.js')}}"></script>
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
   
@endpush
