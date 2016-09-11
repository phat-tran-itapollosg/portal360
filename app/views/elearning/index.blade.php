@extends('layouts.master')

@section('title', trans('enrollment_index.page_title'))

@section('styles')
<!--  1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->

@stop

@section('content')
<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel panel-default">  
            <header class="panel-heading" style="border-radius:0">
                <b>{{ trans('enrollment_index.page_title') }}</b>
            </header>

            <div class="panel-body">
                <form action="{{URL::asset('/elearning/')}}" method="post">
                <div class="form-group">
                  <select name="class-id">
                    @foreach($enrollents as $key => $enrollment)
                    <option value="{{ $enrollment->class_name }}">{{ $enrollment->class_name }}</option>
                    @endforeach
                  </select>
                </div>
                <a href="" class="button"></a>
                </form>                
            </div>
        </section>
    </div>
</div>         
  <!-- page end-->
@stop

@section('scripts')

@stop