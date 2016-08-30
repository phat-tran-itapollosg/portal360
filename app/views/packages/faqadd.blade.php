<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->

  
@extends('layout.layout_master')
@section('layout_content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/css.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/ckeditor/css/samples.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/ckeditor/toolbarconfigurator/lib/codemirror/neo.css') }}">

    <script  language="javascript"  src="{{ URL::asset('public/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('public/ckeditor/samples/js/sample.js') }}"></script>


    <h1 class="title">
        Hỏi Đáp FAQ thêm câu hỏi mới
    </h1>
        <table align="center" >
        <form action="{{URL::asset('alpha/admin/faq/add/data')}}" method="post">
        <!-- {!! Form::open(array('url' => '/faq/add/data', 'method' => 'post'))!!} -->
        <tr>
            <div class="question">
                <td>
                    <label>Câu hỏi</label>
                    <!--{!! Form::label(' Câu hỏi  ') !!} -->
                </td>
                <td class='right'>
                        <input type="text" name="txtq" id ="txtq"><br> 
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
               
                <textarea id='txtr' name='txtr' >
                    
                </textarea>
                <script type="text/javascript">
                         CKEDITOR.replace( 'txtr',
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

