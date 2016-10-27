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
        @foreach ($getfaq1 as $getfaq1s ) 
            <div class="media">
              <div class="media-left">
                <a href="{{ URL::to('/faq/detal') }}/{{$getfaq1s->id}}">
                    @if(!empty($getfaq1s->img)) 
                        <img width="64px"  src="{{URL::asset('public/images/')}}/{{$getfaq1s->img}}">
                    @else
                        <img width="64px"  src="{{ URL::asset('public/img/favicon_apollo.png') }}">
                    @endif 
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">
                    <a href="{{ URL::to('/faq/detal') }}/{{$getfaq1s->id}}">
                        {{ $getfaq1s->faqquestion }}
                    </a>
                </h4>
                    <span class="label label-default">{{$getfaq1s->ccontent}}</span>
              </div>
            </div>
            @endforeach
        </div>
        </section>         
    </div>        
</div>
@stop