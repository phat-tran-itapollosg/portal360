
<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin Basic Demo
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2013, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
-->
<head>
<!-- Force latest IE rendering engine or ChromeFrame if installed -->
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
<meta charset="utf-8">
<title>jQuery File Upload Demo - Basic Plus version</title>
<meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bar, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads. Works with any server-side platform (Google App Engine, PHP, Python, Ruby on Rails, Java, etc.) that supports standard HTML form file uploads.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap styles -->

<!-- Generic page styles -->

<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="{{ URL::asset('public/theme/css/bootstrap.min.css') }}">
</head>



<div class="container" style=" width: 400px; height: 400px; margin: auto; margin-top: 100px ">

     <br>
    <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="glyphicon glyphicon-plus"></i>
        <span>Select files...</span>
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

    <a href="../../edit/{{$id->id}}"> Trở lại cập nhật </a>
</div>

<!-- The basic File Upload plugin -->
<script src="{{ URL::asset('public/theme/js/jquery.js') }}"></script>
<!--<script src="{{ URL::asset('public/js/jquery.fileupload-jquery-ui.js') }}"></script> -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!-- <script src="{{ URL::asset('public/js/jquery.fileupload.js') }}"></script> -->
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'localhost/apollo_portal' ?
                    '/alpha/admin' : '/updata/';

    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        formData: {script: 'tan phat'},
        done: function (e, data) {


            var url= data.result.files[0].url.split("images");

            $.ajax({
              url: "<?php echo URL::asset('/alpha/admin/updatajson'); ?>",
              method: "POST",
              data: { id : "{{$id->id}}" ,url : url[1]},
              dataType: "json"
            }).done(function( msg ) {
                  $( "#log" ).html( msg );
                }).fail(function( jqXHR, textStatus ) {
                  alert( "Request failed: " + textStatus );
                });
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
</script>

<body>