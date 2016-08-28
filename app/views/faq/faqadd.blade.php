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

    <!--upload-->   
    <link rel="stylesheet" href="{{ URL::asset('public/FileUpload/css/jquery.fileupload.css')}}">
    <input id="fileupload" type="file" name="files[]" data-url="server/php/" multiple>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ URL::asset('public/FileUpload/js/vendor/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('public/FileUpload/js/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('public/FileUpload/js/jquery.fileupload.js')}}"></script>
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <!-- Generic page styles -->
    <link rel="stylesheet" href="{{ URL::asset('public/FileUpload/css/style.css')}}">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="{{ URL::asset('public/FileUpload/css/jquery.fileupload.css')}}">
    <script>
    $(function () {
        $('#fileupload').fileupload({
            dataType: 'json',
            done: function (e, data) {
                $.each(data.result.files, function (index, file) {
                    $('<p/>').text(file.name).appendTo(document.body);
                });
            }
        });
    });
    </script>


    <h1 class="title">
        Hỏi Đáp FAQ thêm câu hỏi mới
    </h1>
        <table align="center" >
        <form action="{{URL::asset('/faq/add/data')}}" method="post">
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
            <td colspan="2">
            <div id="progress">
                <div class="bar" style="width: 0%;"></div>
            </div>
            </td>
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


    $('#fileupload').fileupload({
    /* ... */
    progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .bar').css(
                        'width',
                        progress + '%'
                    );
                }
            });

    $(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            data.context = $('<p/>').text('Uploading...').appendTo(document.body);
            data.submit();
        },
        done: function (e, data) {
            data.context.text('Upload finished.');
        }
    });
    $(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            data.context = $('<button/>').text('Upload')
                .appendTo(document.body)
                .click(function () {
                    data.context = $('<p/>').text('Uploading...').replaceAll($(this));
                    data.submit();
                });
        },
        done: function (e, data) {
            data.context.text('Upload finished.');
        }
    });
});
});
</script>
<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
@stop

