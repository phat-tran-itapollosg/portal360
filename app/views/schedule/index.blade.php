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

                      <div class="modal fade session_detail" id="session_detail" data-backdrop="static" data-keyboard="false">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header custom-modal-header">
                                      <h3 class="modal-title custom-modal-header"> {{trans('schedule_index.detail')}}</h3>                                 
                                  </div>

                                  <div class="modal-body overflow-auto">
                           <table class="schedule_detail" width="100%">
                        <tbody>
                        <tr class="schedule_detail_row">
                          <td class="field"><b>{{trans('schedule_index.class')}}:&nbsp;</b></td>
                          <td class="class_name"></td>
                          <td class="field"><b>{{trans('schedule_index.duration')}}:&nbsp;</b></td>
                          <td class="duration"></td>
                        </tr>
                        <tr class="schedule_detail_row">
                          <td class="field"><b>{{trans('schedule_index.start_time')}}:&nbsp;</b></td>
                          <td class="starttime"></td>
                          <td class="field"><b>{{trans('schedule_index.end_time')}}:&nbsp;</b></td>
                          <td class="endtime"></td>
                        </tr>
                        <tr class="schedule_detail_row">
                          <td class="field"><b>{{trans('schedule_index.teacher')}}:&nbsp;</b></td>
                          <td class="teacher_name"></td>
                        </tr>
                        </tbody>
                         

                        </table>
                              </div>

                              <div class="modal-footer">
                                  <button type="button" id="btn-cancel" class="btn" data-dismiss="modal">{{trans('app.btn_close_text')}}</button>
                              </div>
                          </div>
                          </div>
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