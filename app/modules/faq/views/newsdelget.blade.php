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
                <h1>
                    <b> 
                        Các NEWS đã xóa
                    </b>
                </h1>
            </header>

            @foreach ($newsdelget as $newsdelget)       
            <div style=" padding: 10px;  ">
                <img width="60px" height="60px" src="{{URL::asset('public/img/faq/')}}/{{$newsdelget->img}}"> 

                <a class='afaq' href="../../news/edit/{{$newsdelget->id}}">
                   <span style=" margin-left: 10px "> 
                        {{ $newsdelget->newstitle }}
                   </span>
                </a> 
                    <span class="label label-default" style=" margin-left: 20px ">
                        {{ $newsdelget->ncontents }}
                    </span>
            </div>
            <div style=" background-color: #F1F2F7; padding: 4px " ></div>
            @endforeach
    </section>
    @else
    <header class="panel-heading" style="border-radius:0; text-align: center; ">
        <h1>
            <b> 
                Không có FAQ nào đã xóa
            </b>
        </h1>
    </header>
    @endif
</div>
</div>
@stop