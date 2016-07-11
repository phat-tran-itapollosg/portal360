@extends('layouts.master')

@section('title', trans('schedule_listview.page_title'))

@section('styles')
        
@stop

@section('content')
    
    <div class="container">
        <div class="block-header">
            <h2>{{ trans('schedule_listview.page_title') }}</h2>
        </div>
        
        <div class="card">
            <div class="card-body card-padding overflow-auto">
                <table id="data-table" class="datatable table table-striped table-vmiddle">
                    <thead>                                   
                        <tr>
                            <th><b>{{ trans('schedule_listview.class_name') }}</b></th>                             
                            <th data-type="timedate"><b>{{ trans('schedule_listview.start_date') }}</b></th>
                            <th data-type="timedate"><b>{{ trans('schedule_listview.ent_date') }}</b></th>
                            <th><b>{{ trans('schedule_listview.duration') }}</b></th>
                            <th><b>{{ trans('schedule_listview.teacher_name') }}</b></th>
                            <th><b>{{ trans('schedule_listview.room') }}</b></th>   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->class_name }}</td>                                 
                                <td>{{ SugarUtil::formatDate($schedule->date_start) }}</td>
                                <td>{{ SugarUtil::formatDate($schedule->date_end) }}</td>
                                <td>{{ $schedule->duration }}</td>
                                <td>{{ $schedule->teacher_name }}</td>
                                <td>{{ $schedule->room_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ URL::asset('public/vendors/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/datatabel.js') }}"></script>       
    
@stop