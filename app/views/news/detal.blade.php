<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('public/css/css.css' )}}">
<div class='row'>
    <div class="col-lg-12">
         @foreach ($Getdetal as $Getdetal) 
         <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
                <b> 
                    {{ $Getdetal->ntitle }}
                </b>
            </header>
            
            <div class="panel-body">        
                <span class="label label-default">
                    {{$Getdetal->ncontent}}
                </span>
            </div>   
                    
            <div class="imgquestiondetal"> 
                <img width="300px" height="300px" src="{{URL::asset('public/img/notifications.png')}}"> 
            </div>
            <div>
                Ngày tạo: 
                 {{ $Getdetal->ndate }}
            </div>
        @endforeach
    </section>

    </div>
</div>  
@stop
                    