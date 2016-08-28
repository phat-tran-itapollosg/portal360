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
          <b>News</b>
        </header>
        <div class="panel-body">
                <ul class='ulli'>
                @foreach ($getnews as $getnewsv) 

                    <li class="boxfaq" style="padding:10px">

                        <div class="task-title imgquestion" style="display:inline-block"> 
                            <img src="{{URL::asset('public/img/faq/favicon_apollo.png')}}"> 
                        </div>
                        <div class="questionhv" style="display:inline-block; padding-left:10px">

                            <a class='afaq' href="news/detal/{{$getnewsv->id}}">{{ $getnewsv->ntitle }}</a>
                            <br>    
                            Danh mục:    
                            <a class='afaq' href="faq/category/{{$getnewsv->idcate}}">

                                    {{$getnewsv->ccontents}}
                            </a> 
                        </div>
                        <div style="float: right; ">
                            {{$getnewsv->ndate}}
                        </div>
                    </li>
                @endforeach
                </ul>
        </div>
      </section>
    </div>
  </div>

@stop