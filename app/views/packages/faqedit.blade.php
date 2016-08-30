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
<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
                <b> 
                    Chỉnh sửa FAQ
                </b>
            </header>

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
                </td>
            </div>
        </tr>
        <tr>
        <div class="question">
            <td>
                 <label class="lbfaq"> Thêm Hình Đại diện </label>
            </td>
            <td style="margin: 5px; float: left; background-color: #0F192A; margin-left: 20px ; padding: 8px " >
                <a href="../upload/images/{{$infofaq->id}}">Upload hình đại diện</a>
            </td>
        </div>
        </tr>
        <tr>
            <div class="question">
                <td>
                         <label class="lbfaq">Câu hỏi: </label>
                </td>
                <td>
                        <input style="float:left" class="lbfaq" type="text" name="txtq" value=" {{$infofaq->faqquestion}}">
                           

                    <label class="lbfaq" style="float:left" >__ID Câu hỏi {{$infofaq->id}} </label>

                    <input class="lbfaq" type="text" name="id" value="{{$infofaq->id}}" hidden />
                        
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