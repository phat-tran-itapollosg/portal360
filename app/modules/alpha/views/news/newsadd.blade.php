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
                    {{ trans('news.add') }} {{trans('news.heading')}}
                </b>
            </header>
    <div class="panel-body">
        <form action="{{URL::asset('admin/news/add/data')}}" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1"> {{trans('news.category')}} </label>
                <select name="idcate" class="form-control">
                    @foreach($getcate as $sel)
                        <option value ="{{ $sel->nid }}" >{{$sel->ccontents}}</option>
                    @endforeach        
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ trans('news.title') }}</label>
                <input class="form-control text-left" type="text" name="txttitle">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">{{ trans('news.contents') }}</label>
                <textarea class="form-control" id='txtcontents' name='txtcontents' >
                </textarea>
                <script type="text/javascript">
                         CKEDITOR.replace( 'txtcontents',
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

</script>

@stop

