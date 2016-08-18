<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->

@extends('layouts.master')
@section('content')
    <link rel="stylesheet" href="{{ URL::asset('public/css/css.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/ckeditor/css/samples.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/ckeditor/toolbarconfigurator/lib/codemirror/neo.css') }}">

    <script  language="javascript"  src="{{ URL::asset('public/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('public/ckeditor/samples/js/sample.js') }}"></script>
<div class='content'>
    <h1 class="title">
        Chỉnh sửa FAQ
    </h1>
    @foreach ($infofaq as $infofaq)
    <div class="box">
        <Form action="{{URL::asset('/faq/edit/data/')}}" method="post">
            
        
        <table align="center">
        <tr>
            <div>
                <td>
                         <label class="lbfaq">Danh mục </label>
                </td>
                <td class='right'>
                    <select name="idcate">
                    @foreach($selected as $sel)
                        <option value="{{$sel->cid}}">{{$sel->ccontent}}</option>
                    @endforeach
                    
                    @foreach($cate as $cates)
                        <option value="{{$cates->cid}}">{{$cates->ccontent}}</option>
                    @endforeach
                </select>
                <a class='afaq' href="{{URL::asset('/category/get')}}">
                   Thêm Category 
                </td>
            </div>
        </tr>
            
        <tr>
            <div class="question">
                <td>
                         <label class="lbfaq">Câu hỏi: </label>
                </td>
                <td>
                        <textarea class="textareaq"  required autofocus  name="txtq">
                            {{$infofaq->faqquestion}}
                        </textarea>

                        <label>ID Câu hỏi </label>{{$infofaq->id}}

                        <input type="text" name="id" value="{{$infofaq->id}}" hidden />
                        
                </td>
            </div>
        </tr>
        <tr>
            <div class="question" >
            <td>
                <label class="lbfaq">Câu trả lời </label>
                
            </td>
            <td class='right'>
                <!--
                <textarea class="textarear" cols="1" required  name="txtr" >
                            {{$infofaq->faqreply}}
                </textarea>
                -->
                <textarea id='txtr' name='txtr' >
                            {{$infofaq->faqreply}}
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
                <input type="submit" value=" Lưu lại bảng sửa ">
                ||
                <a class='afaq' href="{{URL::asset('/faq/add')}}">
                   Thêm Câu Hỏi    
                </a>|||
                <a class='afaq' href="{{URL::asset('/faq')}}">
                   Quay lại trang FAQ   
                </a>
        </div>
                
        </Form>
    </div>
    @endforeach   
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
</script>
@stop