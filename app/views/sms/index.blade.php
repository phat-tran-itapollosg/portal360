@extends('layouts.master')

@section('title', trans('sms_index.page_title'))

@section('styles')
 <style>
  @media 
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)
 
    {
    td:nth-of-type(1):before { content: '{{trans('sms_index.phone_number')}}'; } 
    td:nth-of-type(2):before { content: '{{trans('sms_index.content')}} : '; } 
    td:nth-of-type(3):before { content: '{{trans('sms_index.delivery_status')}} : '; } 
    td:nth-of-type(4):before { content: '{{trans('sms_index.date')}} : '; }
    
  }
  </style>    
@stop

@section('content')
<!--  1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-default">  
                <header class="panel-heading" style="border-radius:0">
                    <b>{{ trans('sms_index.page_title') }}</b>
                </header>

                <div class="panel-body">
                <div class="card">
                    <div class="card-body card-padding overflow-auto">
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