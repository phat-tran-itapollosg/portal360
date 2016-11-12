<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
@extends('layouts.master')

@section('styles')
<link href="{{ URL::asset('public/theme/css/tasks.css') }}" rel="stylesheet">  
 <style>
  @media 
  only screen and (max-width: 760px),
  (min-device-width: 768px) and (max-device-width: 1024px)
 
    {
    td:nth-of-type(1):before { content: '#'; } 
    td:nth-of-type(2):before { content: '{{trans('survey.survey') }} : ' ;}
    td:nth-of-type(3):before { content: '{{trans('survey.dosurvey')}} : ';  }   
	}
  </style>  
@stop

@section('content')
<!--<link rel="stylesheet" href="{{ URL::asset('public/css/css.css' )}}"> -->
<div class='row'>
    <div class="col-lg-12">        
            
                <section class="panel panel-default">
                <header class="panel-heading" style="border-radius:0">
                  <b> {{ trans('survey.survey') }} </b>
                </header>
                
                <div class="panel-body">
                @if ((empty($paymentlist) OR count($paymentlist) <=0 OR $paymentlist == '[]'))
              @if(!isset($notify) OR empty($notify))
                <h4><p class="text-center">{{ trans('booking_index.could_not_find') }}</p></h4>
              @else
                <h4><p class="text-center">{{ $notify }}</p></h4>
              @endif
            @else
                	<table id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
	                	<thead>                                   
	                        <tr>
	                            <th>
	                            	<b>#</b>
	                            </th>            
	                            <th>{{ trans('survey.survey') }}</th> 
	                            <th>{{ trans('survey.dosurvey') }}</th> 
	                        </tr>
	                    </thead>
	                    <tbody>
	                        @foreach($surveys as $index => $item)
	                        	@if($item['active'] == 'Y')
	                            <tr>
	                                <td>{{$item['sid']}}</td>                                 
	                                
	                                <td>{{ $item['surveyls_title'] }}</td>
	                                <td><a type="button" class="btn btn-default btn-sm" href="{{ route('Survey.dosurvey', [$item['sid']]) }}" target="_blank"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Do</a></td>
	              
	                            </tr>
	                            @endif
	                        @endforeach
	                    </tbody>
	                </table>   
	                 @endif
                </div>
                </section>
            
    </div>        
</div>
@stop