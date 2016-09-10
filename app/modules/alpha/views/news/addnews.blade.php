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
                    {{ trans('news.add') }} àds
                </b>
            </header>

            </header>
    <div class="panel-body">
        <table align="center" >
        <form action="{{URL::asset('alpha/admin/news/add/data')}}" method="post">
        <!-- {!! Form::open(array('url' => '/ne/add/data', 'method' => 'post'))!!} -->
        <tr>
            <div class="question">
                <td>
                    <label>Tiêu đề</label>
                </td>
                <td class='right'>
                        <input type="text" name="txttitle" id ="txttitle"><br> 
                </td>
            </div>
        </tr>
      
        <tr>
            <td>
                    <label>Danh mục category</label>
                    
                    <!--{!! Form::label(' Câu hỏi  ') !!} -->
            </td>
            <td  class='right'>
                <select name="idcate">
                    @foreach($cate as $cates)
                        <option value="{{$cates->cid}}">{{$cates->ccontent}}</option>
                    @endforeach
                </select>
                <a class='afaq' href="{{URL::asset('/category/get')}}">
                    Thêm Category
                </a>
            </td>
        </tr>
        <tr>
            <div class="question" >
            <td>
                <label>Câu trả  lời </label>
                <!--{!! Form::label(' Câu trả  ') !!}-->
                
            </td>
            <td class='right'>
                <!--<textarea class="textarear" name="txtr" id= 'txtr'>
                </textarea>-->
               
                <textarea id='txtcontents' name='txtcontents' >
                    
                </textarea>
                <script type="text/javascript">
                         CKEDITOR.replace( 'txtcontents',
                         {
                          customConfig : 'config.js',
                          toolbar : 'simple'
                          })

                </script> 
            </td>
            </div>
        </tr>    
        </table>
        <div class="submittable" >
                <input type="submit" value='Lưu lại FAQ'><br>
                <!--{!! Form::submit(' Lưu lại FAQ ')!!}-->
                ||
                <a class='afaq' href="{{URL::asset('/faq/add')}}">
                   Thêm Câu Hỏi    
                </a>|||
                <a class='afaq' href="{{URL::asset('/faq')}}">
                   Quay lại trang FAQ   
                </a>
        </div>
        </form>
        <!--{!! Form::close() !!}-->
         
    </div>
<script>
    var data = CKEDITOR.instances.txtr.getData();
     var inputValue = $("#txtcontents").html;     
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

