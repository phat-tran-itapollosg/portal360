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
    <script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
    <script  language="javascript"  src="{{ URL::asset('public/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('public/ckeditor/samples/js/sample.js') }}"></script>
<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
                <b> 
                    {{ trans('faq.add') }} {{trans('faq.heading')}}
                </b>
            </header>
    <div class="panel-body">
        <form action="{{URL::asset('admin/faq/add/data')}}" name="form" method="post">

            <div class="form-group">
                <label for="exampleInputEmail1"> {{trans('faq.category')}} </label>
                <select name="idcate" class="form-control">
                    @foreach($cate as $cates)
                        <option value="{{$cates->cid}}">{{$cates->ccontent}}</option>
                    @endforeach        
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ trans('faq.faqquestion') }}</label>
                <input class="form-control text-left" type="text" name="txtq">
            </div>
            <div class="form-group">
                <label for="lang">{{ trans('faq.lang') }}</label>
                <label class="radio-inline">
                  <input type="radio" name="lang" id="lang-0" value="0" checked="checked"> {{ trans('faq.vi') }}
                </label>
                <label class="radio-inline">
                  <input type="radio" name="lang" id="lang-1" value="1"> {{ trans('faq.en') }}
                </label>
            </div>
            <div class="form-group">
            <label for="exampleInputFile">{{ trans('faq.faqreply') }}</label>
            <textarea class="form-control" id='txtr' name='txtr' >

            </textarea>
            <script type="text/javascript">
                     CKEDITOR.replace( 'txtr',
                     {
                      customConfig : 'config.js',
                      toolbar : 'simple'
                      })

            </script> 
            </div>
              
             <p class="text-center"> <button type="submit" class="btn btn-default"> {{ trans('news.submit') }} </button> <a class="btn btn-default" href="{{URL::asset('/admin/news')}}">{{ trans('news.back') }}  </a></p>
        </form>
    </section>
    </div>
</div>
<script>
    var data = CKEDITOR.instances.txtr.getData();
     var inputValue = $("#txtr").html;     
        $.ajax( {
            type : "POST",
            cache : false,
            async : true,
            global : false,
            url : "URL POST DATA",
            data : {
                editorcontents : escape(inputValue),
            }
        } ).done( function ( data )
        {   
            //Handle event send done;
        } )



@stop
