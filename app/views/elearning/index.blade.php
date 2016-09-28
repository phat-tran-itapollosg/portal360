@extends('layouts.master')

@section('title', trans('app.page_title'))

@section('styles')
<!--  1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->

@stop

@section('content')
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-default">  
            <header class="panel-heading" style="border-radius:0">
                <b>{{ trans('app.elearning') }}</b>
            </header>

            <div class="panel-body">
               
                @if (empty($elearnings) OR count($elearnings) <=0 OR $elearnings == '[]')
                  <h4><p class="text-center">{{ trans('elearning.could_not_find') }}</p></h4>
                @else
                <h4><p class="text-center">{{ trans('elearning.form_heading') }}</p></h4>
                <form class="form-horizontal" action="{{ route('elearning.login') }}" method="GET" target="_blank">
                  <div class="form-group">
                    
                    <label for="" class="col-sm-4 control-label">{{ trans('elearning.form_label') }}</label>
                    <div class="col-sm-4">
                      <select name="sso_code" class="form-control">
                        @foreach($elearnings as $key => $value)
                        <option value="{{ $key }}&{{ http_build_query($value, '', '&amp;') }}">{{ $value['class_room_name'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <p class="text-center"><button type="submit" class="btn btn-default">{{ trans('user_login.login') }}</button></p>
                    </div>
                  </div>
                </form> 
                @endif             
            </div>
        </section>
    </div>
</div>         
  <!-- page end-->
@stop

@section('scripts')

@stop