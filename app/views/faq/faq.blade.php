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
            @if($flat==0)
                <section class="panel panel-default">
                <header class="panel-heading" style="border-radius:0">
                  <b>Hỏi Đáp FAQ</b>
                </header>

                <div class="panel-body">
                    <ul class='ulli'>
                <div class="faqli">
                @foreach ($getfaq1 as $getfaq1s) 

                    @if(@admin==0)
                    <li class="boxfaq" style="padding:10px">

                        <div class="task-title imgquestion" style="display:inline-block"> 
                            <img src="{{URL::asset('public/img/faq/favicon_apollo.png')}}"> 
                        </div>
                        <div class="questionhv" style="display:inline-block; padding-left:10px">

                            <a class='afaq' href="faq/detal/{{$getfaq1s->id}}">{{ $getfaq1s->faqquestion }}</a>
                            <br>    
                            Danh mục:    
                            <a class='afaq' href="faq/category/{{$getfaq1s->idcate}}">

                                    {{$getfaq1s->ccontent}}
                            </a> 
                        </div>
                    
                    </li>
                    @else($admin==1)
                    <li class="boxfaq">

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
                    </li>
                @endif
                    @endforeach
                    </div>   
                    </ul>
                </div>
                </section>
            @elseif($flat==1)
                <section class="panel panel-default">
                <header class="panel-heading" style="border-radius:0">
                  <b>Các FAQ đã xóa</b>
                </header>

                <div class="panel-body">
                    <ul class='ulli'>
                <div class="faqli">
                @foreach ($faqdelget as $infofaq)
                    <div class="box">
                            <div class="question">
                                    <label class="lbfaq">Câu hỏi: </label>
                                        
                                    <a class='afaq' href='{{URL::asset("faq/edit/$infofaq->id")}}'>
                                            {{$infofaq->faqquestion}}
                                        </a>
                            </div>
                            <div class="question" >
                                        <label class="lbfaq"></label>
                                <td class='right'>
                                    <label>{{$infofaq->faqreply}}
                            </div>
                            <div class="question" >
                                    <a class='afaq' href='{{URL::asset("faq/edit/$infofaq->id")}}'>
                                        Sửa và phục hồi</a>
                                    ||
                                    <a class='afaq' href="{{URL::asset('/faq/add')}}">
                                       Thêm Câu Hỏi    
                                    </a>|||
                                    <a class='afaq' href="{{URL::asset('/faq')}}">
                                       Quay lại trang FAQ   
                                    </a>
                            </div>
                    </div>
                    @endforeach   
                     </div>   
                    </ul>
                    </div>
                    </section>    
                @elseif($flat==-1)
                    <section class="panel panel-default">
                    <header class="panel-heading" style="border-radius:0">
                      <b>Không có FAQ đã xóa</b>
                    </header>
            @endif
            @if($flat==2)
                
                @foreach ($FaqCategory as $getfaq1s)
                    <h1 class="title"> 
                    @if(++$i==1)
                       Chuyên mục {{$getfaq1s->ccontent}}
                    @endif
                    </h1>
                @endforeach


                @foreach ($FaqCategory as $getfaq1s) 

                <div class="box" style="padding: 10px">
                        <div class="question">
                        Câu hỏi:    
                            <a class='afaq' href="../edit/{{$getfaq1s->id}}">
                            {{ $getfaq1s->faqquestion }}</a>
                            
                        </div>
                        <div class="category">
                            Danh mục:    
                            <a class='afaq' href="../category/{{$getfaq1s->idcate}}">

                                    {{$getfaq1s->ccontent}}
                            </a>        
                        </div>
                </div>
                    @endforeach
            @endif
    </div>        
</div>
@stop