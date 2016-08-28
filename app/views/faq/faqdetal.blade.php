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
    @foreach ($detal as $getfaq1s) 

    @if(@admin==0)
        <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
                <b> 
                    {{ $getfaq1s->faqquestion }}
                </b>
            </header>
            <div class="panel-body">        
                    <a class='afaq' href="faq/category/{{$getfaq1s->idcate}}">
                        <span class="label label-default">
                            {{$getfaq1s->ccontent}}
                        </span>
                            
                    </a> 
            </div>
            <div class="imgquestiondetal"> 
                <img width="300px" height="300px" src="public/img/faq/{{$getfaq1s->img}}"> 
            </div>
            <div class="detalfaqreply" >
                 {{ $getfaq1s->faqreply }}
            </div>
            <div>
                Ngày tạo: 
                 {{ $getfaq1s->faqdate }}
            </div>
    </section>
    </div>
                    
    @else($admin==1)
        <div class="boxfaq">

            <div class="imgquestion"> 
                <img src="{{URL::asset('public/img/faq/favicon_apollo.png')}}"> 
            </div>
            <div class="questionhv">

                <a class='afaq' href="faq/edit/{{$getfaq1s->id}}">{{ $getfaq1s->faqquestion }}</a>
                <br>    
                Danh mục:    
                <a class='afaq' href="faq/category/{{$getfaq1s->idcate}}">

                        {{$getfaq1s->ccontent}}
                </a> 
            </div>
            <div class="reply">
                
                <div class="question">
                    ||
                    <a class='afaqadd' href="faq/edit/{{$getfaq1s->id}}">Sửa</a>
                    
                        &nbsp;||
                    <a class='afaqadd' href="{{URL::asset('/faq/add')}}">
                       Thêm FAQ 
                </a> 
                    &nbsp;||
                <a class='afaqadd' href="faq/del/data/{{$getfaq1s->id}}">
                    Xóa FAQ
                </a> 
                    &nbsp;||
                <a class='afaqadd' href="{{URL::asset('faq/del/get')}}">
                    Các tin đã Xóa
                </a> 
                    &nbsp;||
                </div>
            </div>
    @endif
        @endforeach

    </div>
@stop