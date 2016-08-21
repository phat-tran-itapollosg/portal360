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
                                </canvas>                          
                                <img src="{{ URL::asset('/public/img/logo_apollo.png') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" width="101" height="101px"/>      
                            </div>
                        </div>
                        <div class="bio-desk" style="color:#aec785">
                            <h4 class="terques">{{ $enrollment->class_name }}</h4>
                            <p><b>{{trans('enrollment_index.ec')}}: </b>{{ $enrollment->ec_name }}</p>
                            <p><b>{{trans('enrollment_index.center')}}: </b>{{ $enrollment->center }}</p>
                        </div>
                        <div class="bio-content">
                            <table style="float:left;margin-left:5px">
                              <col width="130">
                              <col width="80">
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
                                </canvas>                          
                                <img src="{{ URL::asset('/public/img/logo_apollo.png') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" width="101" height="101px"/>      
                            </div>
                        </div>
                        <div class="bio-desk" style="color:#aec785">
                            <h4 class="terques">{{ $enrollment->class_name }}</h4>
                            <p><b>{{trans('enrollment_index.ec')}}: </b>{{ $enrollment->ec_name }}</p>
                            <p><b>{{trans('enrollment_index.center')}}: </b>{{ $enrollment->center }}</p>
                        </div>
                        <div class="bio-content">
                            <table style="float:left;margin-left:5px">
                              <col width="130">
                              <col width="80">
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
                            <div style="display:inline;width:101px;height:101px;">
                                </canvas>                          
                                <img src="{{ URL::asset('/public/img/logo_apollo.png') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" width="101" height="101px"/>      
                            </div>
                        </div>
                        <div class="bio-desk" style="color:#aec785">
                            <h4 class="terques">{{ $enrollment->class_name }}</h4>
                            <p><b>{{trans('enrollment_index.ec')}}: </b>{{ $enrollment->ec_name }}</p>
                            <p><b>{{trans('enrollment_index.center')}}: </b>{{ $enrollment->center }}</p>
                        </div>
                        <div class="bio-content">
                            <table style="float:left;margin-left:5px">
                              <col width="130">
                              <col width="80">
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

                <!--
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $enrollment->class_name }} </td>
                    <td>{{ SugarUtil::formatDate($enrollment->start_date) }} </td>
                    <td>{{ SugarUtil::formatDate($enrollment->end_date) }} </td>
                    <td>{{ $enrollment->total_amount }} </td>
                    <td>{{ $enrollment->balance }} </td>
                    <td>{{ $enrollment->total_hour }} </td>
                    <td>{{ $enrollment->balance_hour }} </td>
                    <td>{{ $enrollment->ec_name }} </td>
                    <td>{{ $enrollment->center }} </td>       
                </tr>
                -->
                

      </div>

  <!-- page end-->
<!--
    <div class="container">
        <div class="block-header">
            <h2>{{ trans('enrollment_index.page_title') }}</h2>
        </div>
        
        <div class="card">
            <div class="card-body card-padding overflow-auto">
                <table id="data-table" class="datatable table table-striped table-vmiddle">
                    <thead>
                        <tr>
                            <th>{{trans('enrollment_index.no')}}</th>
                            <th>{{trans('enrollment_index.class')}}</th>
                            <th>{{trans('enrollment_index.start_date')}}</th>
                            <th>{{trans('enrollment_index.end_date')}}</th>
                            <th>{{trans('enrollment_index.total_amount')}}</th>
                            <th>{{trans('enrollment_index.ending_balance')}}</th>
                            <th>{{trans('enrollment_index.total_hour')}}</th>
                            <th>{{trans('enrollment_index.ending_hour')}}</th>
                            <th>{{trans('enrollment_index.ec')}}</th>
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
                                <td>{{ $enrollment->total_amount }} </td>
                                <td>{{ $enrollment->balance }} </td>
                                <td>{{ $enrollment->total_hour }} </td>
                                <td>{{ $enrollment->balance_hour }} </td>
                                <td>{{ $enrollment->ec_name }} </td>
                                <td>{{ $enrollment->center }} </td>       
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
    
-->
@stop

@section('scripts')
<!--
    <script src="{{ URL::asset('public/vendors/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/datatabel.js') }}"></script>
-->
    <script src="{{ URL::asset('public/theme/assets/jquery-knob/js/jquery.knob.js') }}"></script>
@stop