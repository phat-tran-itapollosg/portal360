@extends('layouts.master')

@section('title', trans('enrollment_index.page_title'))

@section('styles')
<!--  1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->

@stop
<!-- <link href="{{ URL::asset('public/css/stylers.css') }}" rel="stylesheet">  -->
<style>
  @media 
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)  {
  td:nth-of-type(1):before { content: '{{trans('enrollment_index.no')}} : '; } 
    td:nth-of-type(2):before { content: '{{trans('enrollment_index.class')}} : '; } 
    td:nth-of-type(3):before { content: '{{trans('enrollment_index.start_date')}} : '; }
    td:nth-of-type(4):before { content: '{{trans('enrollment_index.end_date')}} : '; }
    td:nth-of-type(5):before { content: '{{trans('enrollment_index.total_amount')}} : '; }
    td:nth-of-type(6):before { content: '{{trans('enrollment_index.ending_balance_mobile')}} : '; }
    td:nth-of-type(7):before { content: '{{trans('enrollment_index.total_hour')}} : '; }
    td:nth-of-type(8):before { content: '{{trans('enrollment_index.ending_hour')}} : '; }
    td:nth-of-type(9):before { content: '{{trans('enrollment_index.ec')}} : '; }
    td:nth-of-type(10):before { content: '{{trans('enrollment_index.center')}} : '; }

  }
  </style>
@section('content')
<!-- page start-->
      <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-default">  
            <header class="panel-heading" style="border-radius:0">
                <b>{{ trans('enrollment_index.page_title') }}</b>
            </header>

            <div class="panel-body">
            <div class="card">
            <div class="card-body card-padding overflow-auto">
                <table id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">

<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
                    <thead>
                        <tr>
                            <th>{{trans('enrollment_index.no')}}</th>
                            <th>{{trans('enrollment_index.class')}}</th>
                            <th>{{trans('enrollment_index.start_date')}}</th>
                            <th>{{trans('enrollment_index.end_date')}}</th>
                            <th class="hidden-xs">{{trans('enrollment_index.total_amount')}}</th>
                            <th class="hidden-xs">{{trans('enrollment_index.ending_balance')}}</th>
                            <th class="hidden-xs">{{trans('enrollment_index.total_hour')}}</th>
                            <th class="hidden-xs hidden-sm">{{trans('enrollment_index.ending_hour')}}</th>
                            <th class="hidden-xs hidden-sm">{{trans('enrollment_index.ec')}}</th>
                            <th class="hidden-xs hidden-sm">{{trans('enrollment_index.center')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enrollents as $key => $enrollment)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $enrollment->class_name }} </td>
                                <td>{{ SugarUtil::formatDate($enrollment->start_date) }} </td>
                                <td>{{ SugarUtil::formatDate($enrollment->end_date) }} </td>
                                <td class="hidden-xs">{{ $enrollment->total_amount }} </td>
                                <td class="hidden-xs">{{ $enrollment->balance }} </td>
                                <td class="hidden-xs">{{ $enrollment->total_hour }} </td>
                                <td class="hidden-xs hidden-sm">{{ $enrollment->balance_hour }} </td>
                                <td class="hidden-xs hidden-sm">{{ $enrollment->ec_name }} </td>
                                <td class="hidden-xs hidden-sm">{{ $enrollment->center }} </td>       
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
<!-- 1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
            </div>
            </div>
            </section>
        </div>

    </div>
    
    <!-- 
        <div class="col-lg-4">
                @foreach($enrollents as $key => $enrollment)
                @if ($key % 3 === 0)
                <div class="panel">
                    <div class="panel-body">
                        <div class="bio-chart">
                            <div style="display:inline;width:101px;height:101px;">                   
                                <img src="{{ URL::asset('/public/img/logo_apollo.png') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" width="101" height="auto"/>      
                            </div>
                        </div>
                        <div class="bio-desk" style="color:#aec785">
                            <h4 class="terques">{{ $enrollment->class_name }}</h4>
                            <p><b>{{trans('enrollment_index.ec')}}: </b>{{ $enrollment->ec_name }}</p>
                            <p><b>{{trans('enrollment_index.center')}}: </b>{{ $enrollment->center }}</p>
                        </div>
                        <div class="bio-content">
                            <table style="float:left">
                              <col width="150">
                              <col width="100">
                              <tr>
                                <td><b>{{trans('enrollment_index.total_amount')}}:</b></td>
                                <td>{{ $enrollment->total_amount }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.ending_balance')}}: </b></td>
                                <td>{{ $enrollment->balance }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.total_hour')}}:</b></td>
                                <td>{{ $enrollment->total_hour }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.ending_hour')}}:</b></td>
                                <td>{{ $enrollment->balance_hour }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.start_date')}}:</b></td>
                                <td>{{ SugarUtil::formatDate($enrollment->start_date) }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.end_date')}}:</b></td>
                                <td>{{ SugarUtil::formatDate($enrollment->end_date) }}</td>
                              </tr>
                            </table>                            
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
        </div>
        <div class="col-lg-4">
                @foreach($enrollents as $key => $enrollment)
                @if ($key % 3 === 1)
                <div class="panel">
                    <div class="panel-body">
                        <div class="bio-chart">
                            <div style="display:inline;width:101px;height:101px;">                        
                                <img src="{{ URL::asset('/public/img/logo_apollo.png') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" width="101" height="auto"/>      
                            </div>
                        </div>
                        <div class="bio-desk" style="color:#aec785">
                            <h4 class="terques">{{ $enrollment->class_name }}</h4>
                            <p><b>{{trans('enrollment_index.ec')}}: </b>{{ $enrollment->ec_name }}</p>
                            <p><b>{{trans('enrollment_index.center')}}: </b>{{ $enrollment->center }}</p>
                        </div>
                        <div class="bio-content">
                            <table style="float:left">
                              <col width="150">
                              <col width="100">
                              <tr>
                                <td><b>{{trans('enrollment_index.total_amount')}}:</b></td>
                                <td>{{ $enrollment->total_amount }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.ending_balance')}}: </b></td>
                                <td>{{ $enrollment->balance }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.total_hour')}}:</b></td>
                                <td>{{ $enrollment->total_hour }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.ending_hour')}}:</b></td>
                                <td>{{ $enrollment->balance_hour }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.start_date')}}:</b></td>
                                <td>{{ SugarUtil::formatDate($enrollment->start_date) }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.end_date')}}:</b></td>
                                <td>{{ SugarUtil::formatDate($enrollment->end_date) }}</td>
                              </tr>
                            </table>                            
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
        </div>
        <div class="col-lg-4">
                @foreach($enrollents as $key => $enrollment)
                @if ($key % 3 === 2)
                <div class="panel">
                    <div class="panel-body">
                        <div class="bio-chart">
                            <div style="display:inline">                          
                                <img src="{{ URL::asset('/public/img/logo_apollo.png') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" width="101" height="auto"/>      
                            </div>
                        </div>
                        <div class="bio-desk" style="color:#aec785">
                            <h4 class="terques">{{ $enrollment->class_name }}</h4>
                            <p><b>{{trans('enrollment_index.ec')}}: </b>{{ $enrollment->ec_name }}</p>
                            <p><b>{{trans('enrollment_index.center')}}: </b>{{ $enrollment->center }}</p>
                        </div>
                        <div class="bio-content">
                            <table style="float:left">
                              <col width="150">
                              <col width="100">
                              <tr>
                                <td><b>{{trans('enrollment_index.total_amount')}}:</b></td>
                                <td>{{ $enrollment->total_amount }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.ending_balance')}}: </b></td>
                                <td>{{ $enrollment->balance }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.total_hour')}}:</b></td>
                                <td>{{ $enrollment->total_hour }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.ending_hour')}}:</b></td>
                                <td>{{ $enrollment->balance_hour }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.start_date')}}:</b></td>
                                <td>{{ SugarUtil::formatDate($enrollment->start_date) }}</td>
                              </tr>
                              <tr>
                                <td><b>{{trans('enrollment_index.end_date')}}:</b></td>
                                <td>{{ SugarUtil::formatDate($enrollment->end_date) }}</td>
                              </tr>
                            </table>                            
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
        </div>    
        -->          
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