@extends('layouts.master')

@section('title', trans('booking_index.page_title'))

@section('styles')
<!--  1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->

@stop

@section('content')
<!-- page start-->
<div class="row">
<div class="col-lg-12">
    <section class="panel panel-default">  
    <header class="panel-heading" style="border-radius:0">
        <b>{{ trans('booking_index.page_title') }}</b>
    </header>

    <div class="panel-body">
    <div class="card">
    <div class="card-body card-padding overflow-auto">
        <table id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
            <thead>
                <tr>
                    <th>{{trans('booking_index.type')}}</th>
                    <th>{{trans('booking_index.schedule')}}</th>
                    <th>{{trans('booking_index.topic')}}</th>
                    <th>{{trans('booking_index.teacher')}}</th>
                    <th>{{trans('booking_index.date')}}</th>
                    <th>{{trans('booking_index.room')}}</th>
                    <th>{{trans('booking_index.center')}}</th>
                </tr>
            </thead>
            <tbody>
                <!--@foreach($enrollents as $key => $booking) -->
                    <tr>
                        <td>Skill</td>
                        <td>6:00 - 8:00</td>
                        <td>............ </td>
                        <td>.............</td>
                        <td>Monday</td>
                        <td>68 </td>
                        <td>Pham Ngoc Thach</td>       
                    </tr>
                <!--@endforeach-->
            </tbody>
        </table> 
    </div>

    </div>
    </div>
    </section>
</div>
</div>

  <!-- page end-->
@stop

@section('scripts')

@stop