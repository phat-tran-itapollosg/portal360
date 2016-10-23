<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
@extends('layout.layout_master')
@section('layout_content')

<link rel="stylesheet" href="{{ URL::asset('public/css/style.css')}}">

<link rel="stylesheet" href="{{ URL::asset('public/css/jquery.fileupload.css')}}">
<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
                <b> 
                 {{trans('faq.updateImage')}}           </b>
            </header>
    <div class="panel-body">
     <br>
    <!-- The fileinput-button span is used to style the file input field as button -->
        <span class="btn btn-success fileinput-button" style=" color: black; background-color: #4C8EFA ; text-align: center; ">
            <i class="glyphicon glyphicon-plus"></i>
            <span>
                {{trans('faq.updateImage')}} 
            </span>
            <!-- The file input field used as target for the file upload widget -->
            <input id="fileupload" type="file" name="files[]" multiple>
        </span>
        <br>
        <br>
        <!-- The global progress bar -->
        <div id="progress" class="progress">
            <div class="progress-bar progress-bar-success"></div>
        </div>
        <!-- The container for the uploaded files -->
        <div id="files" class="files"></div>
        <br>
        
    </section>
    </div>
</div>
@stop
@section('layout_scripts')

<script src="{{ URL::asset('public/FileUpload/js/vendor/jquery.ui.widget.js') }}"></script>
<script src="{{ URL::asset('public/js/jquery.fileupload.js') }}"></script>
<script>
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    // var url = window.location.hostname === 'localhost/apollo_portal' ?
     //               '/admin/faq' : '/updata/';
    $('#fileupload').fileupload({
        url:" {{ URL::to(route('alpha.faq.updata')) }}",
        dataType: 'json',
        formData: {script: 'tan phat'},
        done: function (e, data) {


            var url= data.result.files[0].url.split("images");
            // console.log('alpha.faq.updata',url);
            $.ajax({
              url: " {{URL::to(route('alpha.faq.updatajson'))}} ",
              method: "POST",
              data: { id : "{{$id}}" ,url : url[1]},
              dataType: "json"
            }).done(function( msg ) {
              $( "#log" ).html( msg );
              if(msg.result == true){
                alert("{{trans('faq.ImageNoteSuccess')}}");
                window.location.href = "{{ URL::to(route('alpha.faq.faq')) }}";
              }else{
                alert("{{trans('faq.ImageNotefailed')}}");
                window.location.href = "{{ URL::to(route('alpha.500')) }}";
              }
              //console.log('alpha.faq.updata',msg);
            }).fail(function( jqXHR, textStatus ) {
                 alert("{{trans('faq.ImageNotefailed')}}");
                window.location.href = "{{ URL::to(route('alpha.500')) }}";
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        },
        fail: function () {
            alert("{{trans('faq.ImageNotefailed')}}");
            window.location.href = "{{ URL::to(route('alpha.500')) }}";
        }
    });
    
    
    

});
</script>

@stop
