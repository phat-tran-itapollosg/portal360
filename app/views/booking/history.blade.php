@extends('layouts.master')

@section('title', trans('enrollment_index.page_title'))

@section('styles')
<!--  1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->

@stop

@section('content')
<!-- page start-->
<div class="row">
<div class="col-lg-12">
    <section class="panel panel-default">  
    <header class="panel-heading text-uppercase" style="border-radius:0">
        <b>{{ trans('booking_index.page_title_history') }}</b>
    </header>

    <div class="panel-body">
    <div class="card">
    <div class="card-body card-padding overflow-auto">
        <table id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
            <thead>
                <tr>
                    <th>{{trans('booking_index.type')}}</th>
                    <th>{{trans('booking_index.schedule')}}</th>
                    <th>{{trans('booking_index.topic')}}</th>
                    <th>{{trans('booking_index.teacher')}}</th>
                    <th>{{trans('booking_index.date')}}</th>
                    <th>{{trans('booking_index.room')}}</th>
                    <th>{{trans('booking_index.center')}}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                 @foreach($session_booking as $key => $booking)
                    <tr>
                        <td>{{ $booking['type'] }}</td>
                        <td>{{ $booking['schedule_time'] }}</td>
                        <td>{{ $booking['topic_name'] }} </td>
                        <td>{{ $booking['teacher_name'] }}</td>
                        <td>{{ $booking['day_name'] }}<br>{{ $booking['schedule_date'] }}</td>
                        <td>{{ $booking['room_name'] }}</td>
                        <td>{{ $booking['center_name'] }}</td>       
                        <td><a class="btn btn-default btn-xs" href="{{ route('Booking.cancel',[  $booking['session_id']  ]) }}" role="button" target="_blank">{{trans('booking_index.cancel')}}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table> 
    </div>
    </div>
    </div>
    </section>
</div> 
</div>

  <!-- page end-->
@stop

@section('scripts')

    <script src="{{ URL::asset('public/theme/assets/jquery-knob/js/jquery.knob.js') }}"></script>
@stop