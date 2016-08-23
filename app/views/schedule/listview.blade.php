@extends('layouts.master')

@section('title', trans('schedule_listview.page_title'))

@section('styles')
        
@stop

@section('content')
    
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-default">  
            <header class="panel-heading" style="border-radius:0">
                <b>{{ trans('schedule_listview.page_title') }}</b>
            </header>
            <div class="panel-body">          
            <div class="card">
            <div class="card-body card-padding overflow-auto">
                <table id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
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

<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
            </div>
            </div>
        </section>
<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->

        </div>
    </div>

@stop

@section('scripts')

    <script src="{{ URL::asset('public/vendors/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/datatabel.js') }}"></script>       
    
@stop