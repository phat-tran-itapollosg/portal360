@extends('layouts.master')

@section('title', trans('enrollment_index.page_title'))

@section('styles')

@stop

@section('content')
<!-- page start-->
      <div class="row">      
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
@stop