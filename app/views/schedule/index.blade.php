@extends('layouts.master')

@section('title', trans('schedule_index.page_title'))

@section('styles')
    <link href="{{ URL::asset('public/theme/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet">

@stop

@section('content')

     <!-- page start-->
              <div class="row">          
                  <aside class="col-lg-12">
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

    <script type="text/javascript">
        var scheduleEvents = {{ json_encode($events) }};
    </script>
    <script src="{{ URL::asset('public/js/schedule_index.js') }}"></script>
    <script src="{{ URL::asset('public/theme/assets/fullcalendar/fullcalendar/fullcalendar.min.js') }}"></script>
    

@stop