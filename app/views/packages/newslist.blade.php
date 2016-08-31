<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
@extends('layout.layout_master')
@section('layout_content')

<!--<link rel="stylesheet" href="{{ URL::asset('public/css/css.css' )}}"> -->
<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
                <header class="panel-heading" style="border-radius:0">
                  <b>Hỏi Đáp FAQ</b>
                </header>

                <div class="panel-body">
                    <ul class='ulli'>
                <div class="faqli">
                @foreach ($getfaq1 as $getfaq1s) 
                    <li class="boxfaq" style="padding:10px">

                        <div class="task-title imgquestion" style="display:inline-block"> 
                            <img src="{{URL::asset('public/img/faq/favicon_apollo.png')}}"> 
                        </div>
                        <div class="questionhv" style="display:inline-block; padding-left:10px">

                            <a class='afaq' href="news/edit/{{$getfaq1s->id}}">{{ $getfaq1s->ntitle }}</a>
                            <br>     
                            <a class='afaq' href="faq/category/{{$getfaq1s->idcate}}">

                                    {{$getfaq1s->ccontents}}
                            </a> 
                        </div>
                    
                    </li>
                @endforeach
                    </div>   
                    </ul>
	</div>
	</section>
@stop