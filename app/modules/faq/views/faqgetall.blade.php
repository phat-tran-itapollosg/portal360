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
                    Tất cả FAQ 
                </b>
            </header>

            @foreach ($faqdelget as $faqdelget)       
            <div style=" padding: 10px;  ">
                <img width="60px" height="60px" src="{{URL::asset('public/img/faq')}}/{{$faqdelget->img}}"> 

                <a class='afaq' href="faq/edit/{{$faqdelget->id}}">
                   <span style=" margin-left: 10px "> 
                        {{ $faqdelget->faqquestion }}
                   </span>
                </a> 
                    <span class="label label-default" style=" margin-left: 20px ">
                        {{ $faqdelget->faqdate }}
                    </span>
                    <span class="label label-danger" style=" margin-left: 2px;">
                        <a style=" color: white " href="faq/del/{{ $faqdelget->id }}"> Xóa </a>
                    </span>
            </div>
            <div style=" background-color: #F1F2F7; padding: 4px " ></div>
            @endforeach
    </section>
</div>
</div>
@stop