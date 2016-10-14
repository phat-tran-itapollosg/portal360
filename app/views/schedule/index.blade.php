@extends('layouts.master')

@section('title', trans('schedule_index.page_title'))

@section('styles')
    <!-- <link href="{{ URL::asset('public/theme/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css') }}" rel="stylesheet"> -->
    <link href="{{ URL::asset('public/theme/assets/fullcalendar/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/css/styles.css') }}" rel="stylesheet">
    <!-- <link href="{{ URL::asset('public/theme/assets/fullcalendar/fullcalendar/fullcalendar.print.css') }}" rel="stylesheet"> -->
<style type="text/css">
      @media screen and (orientation:landscape){

         }
      @media screen and (orientation:portrait){
        .panel-body .wrapper-note .note-item{
           margin-bottom: 10px;
           width:100%;
        }

        .panel-body .wrapper-note .note-item p{
           margin-left:5px;
           color: #fff;
           font-weight: bold;
           padding-top: 2px;
        }
     }
</style>
     

@stop

@section('content')

     <!-- page start-->
              <div class="row">          
                  <aside class="col-lg-12">
                      <section class="panel panel-default">  
                      <header class="panel-heading" style="border-radius:0">
                          <b>{{ trans('app.schedule') }}</b>
                      </header>
                      
                      <div class="panel-body">
                      <div class="wrapper-note">
                          <h3>{{ trans('app.notes') }}</h3>
                          <div class="finished-note note-item">
                            <p>{{ trans('schedule_index.finished') }}</p>
                          </div>

                          <div class="not-started-note note-item">
                              <p class="clear">{{ trans('schedule_index.not_started') }}</p>
                          </div>
                         </div>
                          <div id="calendar" class="has-toolbar"></div>
                      </div>
                      </section>
                  </aside>
              </div>
              <!-- page end-->
@stop

@section('scripts')

<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
    <script type="text/javascript">
        var scheduleEvents = {{ json_encode($events) }};
    </script>
    
    <script src="{{ URL::asset('public/theme/assets/fullcalendar/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ URL::asset('public/theme/assets/fullcalendar/fullcalendar/fullcalendar.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/schedule_index.js') }}"></script>
<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->

@stop