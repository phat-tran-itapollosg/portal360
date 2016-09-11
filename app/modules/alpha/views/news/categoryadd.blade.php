<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
@extends('layout.layout_master')
@section('layout_content')
<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
                <b> 
                     {{ trans('news.add') }} {{trans('news.category')}}                 </b>
            </header>
    <div class="panel-body">
        <form action="{{URL::asset('admin/news/category/add/data')}}" name="form" method="post">

            <div class="form-group">
                <label for="exampleInputEmail1"> {{trans('news.category')}} </label>
                <label for="exampleInputPassword1">{{ trans('news.title') }}</label>
                <input class="form-control text-left" type="text" name="txtCategoryNews">
             <p class="text-center"> <button type="submit" class="btn btn-default"> {{ trans('news.submit') }} </button> <a class="btn btn-default" href="{{URL::asset('/admin/news')}}">{{ trans('news.back') }}  </a></p>
        </form>
    </section>
    </div>
</div>

@stop
