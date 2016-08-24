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
<div class='content'>
    <ul class='ulli'>
        <li class="faqli">
        
            @if($flat==0)
                <h1 class="title">
                    Hỏi Đáp FAQ
                </h1>
                     @foreach ($getfaq1 as $getfaq1s) 

                    @if(@admin==0)
                    <div class="boxfaq">

                        <div class="imgquestion"> 
                            <img src="{{URL::asset('public/img/faq/favicon_apollo.png')}}"> 
                        </div>
                        <div class="questionhv">

                            <a class='afaq' href="faq/detal/{{$getfaq1s->id}}">{{ $getfaq1s->faqquestion }}</a>
                            <br>    
                            Danh mục:    
                            <a class='afaq' href="faq/category/{{$getfaq1s->idcate}}">

                                    {{$getfaq1s->ccontent}}
                            </a> 
                        </div>
                    
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
            @elseif($flat==1)
                <h1 class="title">
                    Các FAQ đã xóa
                </h1>
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
                @elseif($flat==-1)
                    
                <h1 class="title">
                    Không có FAQ đã xóa
                </h1>

            @endif
            @if($flat==2)
                <h1 class="title">
                @foreach ($FaqCategory as $getfaq1s) 
                    {{$getfaq1s->ccontent}}
                </h1>
                <div class="box">
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
                        <div class="reply">
                            {{ $getfaq1s->faqreply }}
                            <div class="question">
                                ||
                                <a class='afaqadd' href="../edit/{{$getfaq1s->id}}">Sửa</a>
                                
                                    &nbsp;||
                                <a class='afaqadd' href="{{URL::asset('/faq/add')}}">
                                   Thêm FAQ 
                            </a> 
                                &nbsp;||
                            <a class='afaqadd' href="../del/data/{{$getfaq1s->id}}">
                                Xóa FAQ
                            </a> 
                                &nbsp;||
                            <a class='afaqadd' href="{{URL::asset('faq/del/get')}}">
                                Các tin đã Xóa
                            </a> 
                                &nbsp;||
                            <a class='afaqadd' href="{{URL::asset('/faq')}}">
                                       Quay lại trang FAQ   
                                </a>
                            </div>
                        </div>
                    
                    @endforeach

            @endif
        </li>   
    </ul>
        
</div>
@stop