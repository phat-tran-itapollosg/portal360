@extends('layouts.master')

@section('title', trans('schedule.page_title'))

@section('styles')

    <link href="{{ URL::asset('public/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/vendors/bower_components/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('public/css/schedule_index.css') }}" rel="stylesheet">

@stop

@section('content')

    <div class="container c-alt">
        <div id="calendar"></div>

        <div id="action-menu">
            <ul class="actions actions-alt" id="fc-actions">
                <li class="dropdown">
                    <a href="" data-toggle="dropdown" aria-expanded="false"><i class="zmdi zmdi-more-vert"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="active"><a data-view="month" href="">{{ trans('schedule_index.calendar_month_view') }}</a></li>
                        <li><a data-view="basicWeek" href="">{{ trans('schedule_index.calendar_week_view') }}</a></li>
                        <li><a data-view="agendaWeek" href="">{{ trans('schedule_index.calendar_agenda_week_view') }}</a></li>
                        <li><a data-view="basicDay" href="">{{ trans('schedule_index.calendar_day_view') }}</a></li>
                        <li><a data-view="agendaDay" href="">{{ trans('schedule_index.calendar_agenda_day_view') }}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
	
@stop

@section('scripts')

    <script src="{{ URL::asset('public/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/bower_components/fullcalendar/dist/lang-all.js') }}"></script>
    <script src="{{ URL::asset('public/js/schedule_index.js') }}"></script>
    <script type="text/javascript">
        var scheduleEvents = {{ json_encode($events) }};
    </script>

@stop