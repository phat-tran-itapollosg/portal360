@extends('layouts.master')

@section('title', trans('payment.page_title'))

@section('styles')
<!--  1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->

@stop

@section('content')
<!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-default">  
            <header class="panel-heading" style="border-radius:0">
                <b>{{ trans('payment.page_title') }}</b>
            </header>

            <div class="panel-body">
            <div class="card">
            <div class="card-body card-padding overflow-auto">
                <table id="data-table" class="table table-bordered table-hover table-striped">

<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('payment.payment_type')}}</th>
                            <th>{{trans('payment.total_amount')}}</th>                           
                            <th>{{trans('payment.payment_amount')}}</th>
                            <th>{{trans('payment.freebalance_amount')}}</th>
                            <th>{{trans('payment.used_amount')}}</th>
                            <th>{{trans('payment.start_date')}}</th>
                            <th>{{trans('payment.payment_expired_date')}}</th>
                            <th>{{trans('payment.total_days')}}</th>
                            <th>{{trans('payment.remain_days')}}</th>
                            <th>{{trans('payment.course_fee_name')}}</th>
                            <th>{{trans('payment.ec_name')}}</th>
                            <th>{{trans('payment.center_name')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                     



                        @foreach($paymentlist as $key => $payment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $payment['payment_type'] }} </td>                               
                                <td>{{ $payment['total_amount'] }} </td>
                                <td>{{ $payment['payment_amount'] }} </td>
                                <td>{{ $payment['freebalance_amount'] }} </td>
                                <td>{{ $payment['used_amount'] }} </td>
                                <td>{{ SugarUtil::formatDate($payment['start_date']) }} </td>
                                <td>{{ SugarUtil::formatDate($payment['payment_expired_date']) }} </td>                              
                                <td>{{ $payment['total_days'] }} </td>
                                <td>{{ $payment['remain_days'] }} </td>
                                <td>{{ $payment['course_fee_name'] }} </td>
                                <td>{{ $payment['ec_name'] }} </td>
                                <td>{{ $payment['center_name'] }} </td>       
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
    
    
      </div>

  <!-- page end-->
@stop

@section('scripts')
<!--
    <script src="{{ URL::asset('public/vendors/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/datatabel.js') }}"></script>
-->
    <script src="{{ URL::asset('public/theme/assets/jquery-knob/js/jquery.knob.js') }}"></script>

<!-- [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) |-->
@stop