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
         @foreach ($Getdetal as $getfaq1s) 
            <section class="panel panel-default">
                <header class="panel-heading" style="border-radius:0">
                    <b> 
                        {{ $getfaq1s->ntitle }}
                    </b>
                </header>
                <div class="panel-body">  
                    <div class="detalfaqreply" >
                         {{ $getfaq1s->ncontent }}
                    </div>
                    <div>
                        {{ trans('faq.date') }}
                        {{ $getfaq1s->ndate }}
                    </div>
                </div>
               
            </section>
        @endforeach
    </div>
</div>  
@stop
                    