<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('public/css/css.css' )}}"><link rel="stylesheet" href="{{ URL::asset('public/css/css.css' )}}">
<link rel="stylesheet" href="{{ URL::asset('public/ckeditor/css/samples.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('public/ckeditor/toolbarconfigurator/lib/codemirror/neo.css') }}">

    <script  language="javascript"  src="{{ URL::asset('public/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('public/ckeditor/samples/js/sample.js') }}"></script>

<textarea id="txtr" name="txtr" rows="7" class="form-control ckeditor" placeholder="Write your message..">
    
</textarea>
                <script type="text/javascript">
                         CKEDITOR.replace( 'txtr',
                         {
                          customConfig : 'config.js',
                          toolbar : 'simple'
                          })
                </script> 

@stop