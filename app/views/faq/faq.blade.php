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
                  <b> {{ trans('faq.heading') }} </b>
                </header>

                <div class="panel-body">
                    <ul class='ulli'>
                <div class="faqli">
                @foreach ($getfaq1 as $getfaq1s ) 

                    <li class="boxfaq" style="padding:10px">

                        <div class="task-title imgquestion" style="display:inline-block"> 
                                
                                @if(!empty($getfaq1s->img)) 
                                    <img width="64px"  src="{{URL::asset('public/images/')}}/{{$getfaq1s->img}}">
                                @else
                                    <img width="64px"  src="{{ URL::asset('public/img/favicon_apollo.png') }}">
                                @endif 
                        </div>
                        <div class="questionhv" style="display:inline-block; padding-left:10px">

                            <a class='afaq' href="faq/detal/{{$getfaq1s->id}}">{{ $getfaq1s->faqquestion }}</a>
                            <br>    
                            {{ trans('faq.category') }}   
                            <a class='afaq' href="faq/category/{{$getfaq1s->idcate}}">

                                    {{$getfaq1s->ccontent}}
                            </a> 
                        </div>
                    
                    </li>
                    @endforeach
                    </div>   
                    </ul>
                </div>
                </section>
           
    </div>        
</div>
@stop