@extends('layouts.master')

@section('title', trans('booking_index.page_title'))

@section('styles')
<style>
  @media 
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {
    td:nth-of-type(1):before { content: '{{trans('booking_index.day_name')}} : '; } 
    td:nth-of-type(2):before { content: '{{trans('booking_index.topic')}} : '; } 
    td:nth-of-type(3):before { content: '{{trans('booking_index.remain_seat')}} : '; }
    td:nth-of-type(4):before { content: '{{trans('booking_index.total_seat')}} : '; }
    td:nth-of-type(5):before { content: ' '; }
  }
  </style>
@stop

@section('content')
<!-- page start-->
<div class="row">
<div class="col-lg-12">
    <section class="panel panel-default">  
    <header class="panel-heading text-uppercase" style="border-radius:0">
        <b>{{ trans('booking_index.page_title') }}</b>
    </header>

    <div class="panel-body">
    <form class="form-inline" method="POST" action="{{ route('Booking.index') }}">
      <div class="form-group">
        <!-- <label for="exampleInputName2">Name</label> -->
        <label for="exampleInputName2">{{trans('booking_index.start_time')}}</label>
        <input type="date" class="form-control" id="form" min="{{$todayDate}}" name="start" placeholder="From" data-toggle="tooltip" title="{{trans('booking_index.start_date_have_to_greater_than_or_equal_to')}} {{$todayDateMDY}}" value="{{ $start }}">
      </div>
      <div class="form-group">
        <label for="exampleInputName2">{{trans('booking_index.end_time')}}</label>
        <input type="date" class="form-control" id="to" name="end" placeholder="To" value="{{ $end }}">
      </div>
      <div class="form-group">
        <label for="exampleInputName2">{{trans('booking_index.type')}}</label>
        <select class="form-control" name="class_type" id="class_type" placeholder="class_type">
          <option value="Skill" @if ($class_type == 'Skill') selected @endif>Skill</option>
          <option value="Connect Club" @if ($class_type == 'Connect Club') selected @endif>Connect Club</option>
          <option value="Connect Event" @if ($class_type == 'Connect Event') selected @endif>Connect Event</option>
          
        </select>
      </div>
      <button type="submit" class="btn btn-primary">{{trans('booking_index.view')}}</button>
    </form>
    <hr>
    @if ((empty($session_booking) OR count($session_booking) <=0 OR $session_booking == '[]') AND $method == 'post' )
      <h4><p class="text-center">{{ trans('booking_index.could_not_find') }}</p></h4>
    @elseif($method == 'post')
    <div class="card">
    <div class="card-body card-padding overflow-auto">
        
        <table id="data-table" class=" table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>{{trans('booking_index.day_name')}}</th>
                    <th>{{trans('booking_index.topic')}}</th>
                    <th>{{trans('booking_index.remain_seat')}}</th>
                    <th>{{trans('booking_index.total_seat')}}</th>
                    
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($session_booking as $key => $booking)
                    <tr>
                        <td>{{ $booking['day_name'] }}, {{ $booking['date_start'] }}</td>
                        
                        <td>{{ $booking['topic_name'] }} </td>
                        <td>{{ $booking['remain_seat'] }}</td>
                        <td>{{ $booking['total_seat'] }}</td>
                        
                        <td>
                        <a class="btn btn-warning btn-xs" href="{{ route('Booking.submit',[  $booking['session_id']  ]) }}" role="button" target="_blank">{{trans('booking_index.booking')}}</a>
                        <br>
                        <!-- <a class=" btn-xs" href="#" role="button"> Detals <span class="glyphicon glyphicon-chevron-right"></span></a> -->
                        
                        <a class="" data-toggle="modal" href="#session-id-{{$booking['session_id']}}">
                                  {{trans('booking_index.detail')}} <span class="fa fa-chevron-circle-right"></span>
                              </a>
                        </td>       
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div> <!-- end card-body -->
    </div> <!-- end card -->

    <!-- Button trigger modal -->

@foreach($session_booking as $key => $booking)
<!-- Modal -->
<div class="modal fade" id="session-id-{{$booking['session_id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{trans('booking_index.detail')}}</h4>
      </div>
      <div class="modal-body">
        <table id="data-table" class=" table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>{{trans('booking_index.class')}}</th>
                    <th>{{trans('booking_index.room')}}</th>
                    <th>{{trans('booking_index.teacher')}}</th>
                    <th>{{trans('booking_index.start_time')}}</th>
                    <th>{{trans('booking_index.end_time')}}</th>
                    <th>{{trans('booking_index.center')}}</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <td>{{ $booking['class_name'] }}</td>
                        
                        <td>{{ $booking['room_name'] }} </td>
                        <td>{{ $booking['teacher_name'] }}</td>
                        <td>{{ $booking['start_time'] }}</td>
                        <td>{{ $booking['end_time'] }}</td>
                        <td>{{ $booking['center_name'] }}</td>
                        
                          
                    </tr>
                
            </tbody>
        </table> 
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('booking_index.close')}}</button>
      </div>
    </div>
  </div>
</div>
@endforeach

    @endif
    </div>
    </section>
</div>
</div>

  <!-- page end-->
@stop

@section('scripts')
@stop