@extends('layouts.master')

@section('title', trans('schedule_index.page_title'))

@section('styles')

    <link href="{{ URL::asset('public/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/css/schedule_index.css') }}" rel="stylesheet">

@stop

@section('content')

     <!-- page start-->
              <div class="row">
                  <aside class="col-lg-3">
                      <h4 class="drg-event-title"> Draggable Events</h4>
                      <div id='external-events'>
                          <div class='external-event label label-primary'>My Event 1</div>
                          <div class='external-event label label-success'>My Event 2</div>
                          <div class='external-event label label-info'>My Event 3</div>
                          <div class='external-event label label-inverse'>My Event 4</div>
                          <div class='external-event label label-warning'>My Event 5</div>
                          <div class='external-event label label-danger'>My Event 6</div>
                          <div class='external-event label label-default'>My Event 7</div>
                          <div class='external-event label label-primary'>My Event 8</div>
                          <div class='external-event label label-info'>My Event 9</div>
                          <div class='external-event label label-success'>My Event 10</div>
                          <p class="border-top drp-rmv">
                              <input type='checkbox' id='drop-remove' />
                              remove after drop
                          </p>
                      </div>
                  </aside>
                  <aside class="col-lg-9">
                      <section class="panel">
                          <div class="panel-body">
                              <div id="calendar" class="has-toolbar"></div>
                          </div>
                      </section>
                  </aside>
              </div>
              <!-- page end-->
	
@stop

@section('scripts')

    <script src="{{ URL::asset('public/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/bower_components/fullcalendar/dist/lang-all.js') }}"></script>
    <script src="{{ URL::asset('public/js/schedule_index.js') }}"></script>
    <script type="text/javascript">
        var scheduleEvents = {{ json_encode($events) }};
    </script>

@stop