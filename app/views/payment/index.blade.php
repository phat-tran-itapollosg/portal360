@extends('layouts.master')

@section('title', trans('payment.page_title'))

@section('styles')
<!--  1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
<style>
  @media 
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)
 
    {
    td:nth-of-type(1):before { content: '#'; } 
    td:nth-of-type(2):before { content: '{{trans('payment.payment_type')}} : '; } 
    td:nth-of-type(3):before { content: '{{trans('payment.total_amount')}} : '; } 
    td:nth-of-type(4):before { content: '{{trans('payment.payment_amount_mobi')}} : '; }
    td:nth-of-type(5):before { content: '{{trans('payment.freebalance_amount_mobi')}} : '; }
    td:nth-of-type(6):before { content: '{{trans('payment.used_amount_mobi')}} : '; }
    td:nth-of-type(7):before { content: '{{trans('payment.start_date_mobi')}} : '; }
    td:nth-of-type(8):before { content: '{{trans('payment.payment_expired_date_mobi')}} : '; }
    td:nth-of-type(9):before { content: '{{trans('payment.total_days_mobi')}} : '; }
    td:nth-of-type(10):before { content: '{{trans('payment.ec_name_mobi')}} : '; }
    td:nth-of-type(11):before { content: '{{trans('payment.center_name_mobi')}} : '; }

  }
  </style>
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
            @if ((empty($paymentlist) OR count($paymentlist) <=0 OR $paymentlist == '[]'))
              @if(!isset($notify) OR empty($notify))
                <h4><p class="text-center">{{ trans('booking_index.could_not_find') }}</p></h4>
              @else
                <h4><p class="text-center">{{ $notify }}</p></h4>
              @endif
            @else

            <div class="card">
            <div class="card-body card-padding overflow-auto">
                <table id="data-table" class="table table-bordered table-hover table-striped">


                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('payment.payment_type')}}</th>
                            <th>{{trans('payment.total_amount')}}</th>                           
                            <th>{{trans('payment.total_days')}}</th>
                            <th>{{trans('payment.start_date')}}</th>
                            <th>{{trans('payment.payment_expired_date')}}</th>                            
                            <th>{{trans('payment.ec_name')}}</th>
                            <th>{{trans('payment.center_name')}}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($paymentlist as $key => $payment)
                            
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $payment['payment_type'] }} </td>                      
                                <td>{{ SugarUtil::formatMoney($payment['total_amount']) }}</td>     
                                <td>{{ $payment['total_days'] }} </td>
                                <td>{{ SugarUtil::formatDate($payment['start_date']) }} </td>
                                <td>{{ SugarUtil::formatDate($payment['payment_expired_date']) }} </td>
                                <td>{{ $payment['ec_name'] }} </td>
                                <td>{{ $payment['center_name'] }} </td>       
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
            </div>
            @endif

            </div>
            </section>
        </div>

    </div>
    </div>
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