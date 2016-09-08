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
                    Chỉnh sửa NEWS
                </b>
            </header>

    @foreach ($infofaq as $infofaq)
    <div class="box">
        <Form action="{{URL::asset('alpha/admin/news/edit/data')}}" method="post">
        <table align="center">
        <tr>
            <td><label class="lbfaq">Hình đại diện</label></td>
            <td> <a href="../upload-images"> Upload </a></td>
        </tr>
        <tr>
            <div>
                <td>
                    <label class="lbfaq">Danh mục </label>
                </td>
                <td class='right'>
                    <select name="idcate">
                    @foreach($selected as $sel)
                        <option value="{{$sel->nid}}">{{$sel->ccontents}}</option>
                    @endforeach
                    
                    @foreach($cate as $cates)
                        <option value="{{$cates->nid}}">{{$cates->ccontents}}</option>
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
                         <label class="lbfaq"> Tiêu đề: </label>
                </td>
                <td>
                        <input style="float:left" class="lbfaq" type="text" name="txttitle" value=" {{$infofaq->    ntitle}}">
                           

                    <label class="lbfaq" style="float:left" >__ID NEWS {{$infofaq->id}} </label>

                    <input class="lbfaq" type="text" name="id" value="{{$infofaq->id}}" hidden />
                        
                </td>
            </div>
        </tr>
        <tr>
            <div class="question" >
            <td>
                <label class="lbfaq"> Nội dung tin </label>
                
            </td>
            <td class='right'>
                <!--
                <textarea class="textarear" cols="1" required  name="txtcontent" >
                            {{$infofaq->    ncontent}}
                </textarea>
                -->
                <textarea id='txtcontent' name='txtcontent' >
                            {{$infofaq->ntitle}}
                        </textarea>
                        <script type="text/javascript">
                                 CKEDITOR.replace( 'txtcontent',
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
        </div>        
        </Form>
    </div>
    @endforeach   
</div>
<script>
    var data = CKEDITOR.instances.txtcontent.getData();
     var inputValue = $("#txtcontent").html;     
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