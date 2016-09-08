<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
@extends('packages.layout_master')
@section('layout_content')
<link rel="stylesheet" href="{{ URL::asset('public/css/css.css' )}}">
<div class='content'>
                <h1 class="title">
                    Hỏi Đáp FAQ
                </h1>

                   @foreach ($GetDelListfaq as $getfaq1s) 

                    <li class="boxfaq" style=" list-style: none;  padding: 5px " >
                            
                        <div class="box" >
                            <img style=" float: left;  padding: 10px " src="{{URL::asset('public/img/faq/favicon_apollo.png')}}"> 

                            <div>
                            <h4>
                                <a href="././edit/{{$getfaq1s->id}}">
                                  {{ $getfaq1s->faqquestion }}
                                </a>
                            </h4> 

                            <span class="label label-success" style=" float: left; " >
                              {{$getfaq1s->ccontent}}
                            </span>
                            <span class="label label-danger" style=" float: left; " >
                               <a class='afaqadd' href="faq/del/data/{{$getfaq1s->id}}">
                                Xóa FAQ
                              </a>
                            </span>
                        </div>
                      </div>
                    </li>
                  @endforeach     

                        
          
  </div>

@stop