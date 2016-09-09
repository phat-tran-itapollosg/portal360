<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
@extends('layout.layout_master')
@section('layout_content')

<link rel="stylesheet" href="{{ URL::asset('public/css/css.css' )}}"> 
<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
                <header class="panel-heading" style="border-radius:0">
                    <b>
                        NEWS
                    </b>
                </header>
                @foreach ($getfaq1 as $getfaq1s) 
                <div style=" padding: 10px;  ">
                    <img width="60px" height="60px" src="{{URL::asset('public/img/news')}}/{{$getfaq1s->img}}"> 

                    <a class='afaq' href="news/edit/{{$getfaq1s->id}}">
                       <span style=" margin-left: 10px "> 
                            {{ $getfaq1s->ntitle }}
                       </span>
                    </a> 
                        <span class="label label-danger" style=" margin-left: 2px;">
                            <a style=" color: white " href="news/del/{{ $getfaq1s->id }}"> Xóa </a>
                        </span>
                </div>
                <div style=" background-color: #F1F2F7; padding: 4px " ></div>
                @endforeach
	</section>
    </div>
</div>
@stop