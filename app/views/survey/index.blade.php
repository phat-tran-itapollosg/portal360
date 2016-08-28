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
@stop

@section('content')
<!--<link rel="stylesheet" href="{{ URL::asset('public/css/css.css' )}}"> -->
<div class='row'>
    <div class="col-lg-12">        
            
                <section class="panel panel-default">
                <header class="panel-heading" style="border-radius:0">
                  <b>Survey</b>
                </header>
                
                <div class="panel-body">
                	<table id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
	                	<thead>                                   
	                        <tr>
	                            <th><b>#</b></th>                             
	                            <th ><b>Survey</b></th>
	                            
	                            <th></th>   
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
                </div>
                </section>
            
    </div>        
</div>
@stop