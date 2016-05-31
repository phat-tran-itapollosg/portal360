@extends('layouts.master')

@section('title', trans('enrollment_index.page_title'))

@section('styles')
   
@stop

@section('content')
    <div class="container">
        <div class="block-header">
            <h2>{{ trans('enrollment_index.page_title') }}</h2>
        </div>
        
        <div class="card">
            <div class="card-body card-padding">
                <table id="data-table" class="datatable table table-striped table-vmiddle">
                    <thead>
                        <tr>
                            <th>{{trans('enrollment_index.no')}}</th>
                            <th>{{trans('enrollment_index.class')}}</th>
                            <th>{{trans('enrollment_index.start_date')}}</th>
                            <th>{{trans('enrollment_index.end_date')}}</th>
                            <th>{{trans('enrollment_index.ending_balance')}}</th>
                            <th>{{trans('enrollment_index.center')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enrollents as $key => $enrollment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $enrollment->class_name }} </td>
                                <td>{{ SugarUtil::formatDate($enrollment->start_date) }} </td>
                                <td>{{ SugarUtil::formatDate($enrollment->end_date) }} </td>
                                <td>{{ $enrollment->balance }} </td>
                                <td>{{ $enrollment->center }} </td>       
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
    
	
@stop

@section('scripts')

@stop