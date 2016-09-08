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
    @if($flat==1) 
    <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
                <b> 
                    Các FAQ đã xóa
                </b>
            </header>

            @foreach ($faqdelget as $faqdelget)       
            <div style=" padding: 10px;  ">
                <img width="60px" height="60px" src="{{URL::asset('public/img/news/')}}/{{$faqdelget->img}}"> 

                <a class='afaq' href="../../faq/edit/{{$faqdelget->id}}">
                   <span style=" margin-left: 10px "> 
                        {{ $faqdelget->faqquestion }}
                   </span>
                </a> 
                    <span class="label label-default" style=" margin-left: 20px ">
                        {{ $faqdelget->faqdate }}
                    </span>
                    <span class="label label-danger" style=" margin-left: 2px;">
                        <a style=" color: white " href="../../faq/redel/{{ $faqdelget->id }}"> Phục hồi </a>
                    </span>
            </div>
            <div style=" background-color: #F1F2F7; padding: 4px " ></div>
            @endforeach
    </section>
    @else
    <h1 class="title">
        Không có FAQ nào đã xóa
    </h1>
    @endif
</div>
@stop