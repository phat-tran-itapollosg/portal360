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
	<div class="panel-body">
		<section class="error-wrapper">
			@if (intval($result->success) == 0)
          <h1 class="btn btn-danger"><i class="fa fa-ban"></i></h1>
          @else
          <h1 class="btn btn-success"><i class="fa fa-check-square-o"></i></h1>
          @endif
          <!-- <h1>404</h1> -->
          <!-- <h2>Page not found</h2> -->
          <h2>{{$result->notify}}</h2>
      </section>
	</div>
	</section>
	</div>
	
</div>



  <!-- page end-->
@stop

@section('scripts')

@stop