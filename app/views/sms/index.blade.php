@extends('layouts.master')

@section('title', trans('sms_index.page_title'))

@section('styles')
   
@stop

@section('content')
    <div class="container">
        <div class="block-header">
            <h2>{{ trans('sms_index.page_title') }}</h2>
        </div>
        
        <div class="card">
            <div class="card-body card-padding">
                <table id="data-table" class="datatable table table-striped table-vmiddle">
                    <thead>
                        <tr>
                            <th>{{trans('sms_index.phone_number')}}</th>
                            <th>{{trans('sms_index.content')}}</th>
                            <th>{{trans('sms_index.delivery_status')}}</th>
                            <th>{{trans('sms_index.date')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($smsList as $sms)
                            <tr>
                                <td >{{ $sms->phone_number }} </td>
                                <td >{{ $sms->description }} </td>
                                <td >{{ $sms->delivery_status }} </td>
                                <td style="padding: 5px;">{{ $sms->date_send }} </td>
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