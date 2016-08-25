@extends('layouts.master')

@section('title', trans('sms_index.page_title'))

@section('styles')
   
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-default">  
            <header class="panel-heading" style="border-radius:0">
                <b>{{ trans('sms_index.page_title') }}</b>
            </header>
            <div class="panel-body">
                <div class="card">
                    <div class="card-body card-padding">
                        <table id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
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
                                        <td style="padding: 5px;">{{ SugarUtil::formatDate($sms->date_send) }} </td>
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
    
    
	
@stop

@section('scripts')
    <script src="{{ URL::asset('public/vendors/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/datatabel.js') }}"></script>
@stop