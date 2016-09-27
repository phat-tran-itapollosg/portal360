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

  <div class='row'>
    <div class="col-lg-12">  
      <section class="panel panel-default">
        <header class="panel-heading" style="border-radius:0; text-align: center; ">
          <b> {{ trans('news.heading') }} </b>
        </header>
        <div class="panel-body">
            @foreach ($getnews as $getnewsv) 
            <div class="media">
              <div class="media-left">
                <a href="news/detal/{{$getnewsv->id}}">
                    @if(!empty($getnewsv->img)) 
                            <img  width="64px" src="{{URL::asset('public/images')}}/{{$getnewsv->img}}">
                    @else
                            <img  width="64px"  src="{{ URL::asset('public/img/favicon_apollo.png') }}">
                    @endif
                </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading">
                    <a href="news/detal/{{$getnewsv->id}}">
                        {{ $getnewsv->ntitle }}
                    </a>
                </h4>
                    <span class="label label-default">{{$getnewsv->ccontents}}</span>
              </div>
            </div>
                @endforeach
        </div>
      </section>
    </div>
  </div>

@stop