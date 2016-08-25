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
<div class='faqdetalcontent'>
                     @foreach ($Getdetal as $Getdetal) 
                        <div>
                        <h2 class="h2faqdetal"> 
                            {{ $Getdetal->ntitle }}
                        </h2>
                                Danh mục:    
                                <a class='afaq' href="faq/category/{{$Getdetal->idcate}}">

                                        {{$Getdetal->ncontent}}
                                </a> 
                        </div>
                        <div class="imgquestiondetal"> 
                            <img width="300px" height="300px" src="{{URL::asset('public/img/notifications.png')}}"> 
                        </div>
                        <div>
                            Ngày tạo: 
                             {{ $Getdetal->ndate }}
                        </div>
                    @endforeach
</div>
@stop
                    