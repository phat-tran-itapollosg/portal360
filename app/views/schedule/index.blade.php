@extends('layouts.master')

@section('title', trans('schedule_index.page_title'))

@section('styles')
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
    <link href="{{ URL::asset('public/theme/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet">
<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->

@stop

@section('content')

<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
     <!-- page start-->
              <div class="row">          
                  <aside class="col-lg-12">
                      <section class="panel panel-default">  
                      <header class="panel-heading" style="border-radius:0">
                          <b>{{ trans('app.schedule') }}</b>
                      </header>
                      
                      <div class="panel-body">
                          <div id="calendar" class="has-toolbar"></div>
                      </div>
                      </section>
                  </aside>
              </div>
              <!-- page end-->
  
<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
@stop

@section('scripts')

<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
    <script type="text/javascript">
        var scheduleEvents = {{ json_encode($events) }};
    </script>
    <script src="{{ URL::asset('public/js/schedule_index.js') }}"></script>
    <script src="{{ URL::asset('public/theme/assets/fullcalendar/fullcalendar/fullcalendar.min.js') }}"></script>
    
<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->

@stop