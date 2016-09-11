<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
@extends('layout.layout_master')
@section('layout_content')
    <link rel="stylesheet" href="{{ URL::asset('public/ckeditor/css/samples.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/ckeditor/toolbarconfigurator/lib/codemirror/neo.css') }}">

    <script  language="javascript"  src="{{ URL::asset('public/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('public/ckeditor/samples/js/sample.js') }}"></script>
<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
                <b> 
                     {{ trans('faq.add') }} {{trans('faq.category')}}                 </b>
            </header>
    <div class="panel-body">
        <form action="{{URL::asset('admin/faq/category/add/data')}}" name="form" method="post">

            <div class="form-group">
                <label for="exampleInputEmail1"> {{trans('faq.category')}} </label>
                <label for="exampleInputPassword1">{{ trans('faq.faqquestion') }}</label>
                <input class="form-control text-left" type="text" name="txtCategoryFaq">
             <p class="text-center"> <button type="submit" class="btn btn-default"> {{ trans('news.submit') }} </button> <a class="btn btn-default" href="{{URL::asset('/admin/news')}}">{{ trans('news.back') }}  </a></p>
        </form>
    </section>
    </div>
</div>

@stop
