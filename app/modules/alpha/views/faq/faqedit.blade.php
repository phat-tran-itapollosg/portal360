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
                    {{ trans('faq.edit') }} {{ trans('faq.heading') }}
                </b>
            </header>
<div class="panel-body">
    @foreach ($infofaq as $infofaq)
    <form action="{{URL::asset('admin/faq/edit/data/')}}" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Danh mục</label>
            <select name="idcate" class="form-control">
                    @foreach($selected as $sel)
                        <option value="{{$sel->cid}}">{{$sel->ccontent}}</option>
                    @endforeach
                    
                    @foreach($cate as $cates)
                        <option value="{{$cates->cid}}">{{$cates->ccontent}}</option>
                    @endforeach
                </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">{{ trans('faq.faqquestion') }}</label>
            <input class="form-control text-left" type="text" name="txtq" value=" {{$infofaq->faqquestion}}">
             <input class="lbfaq" type="text" name="id" value="{{$infofaq->id}}" hidden />
          </div>
          <div class="form-group">
            <label for="exampleInputFile">{{ trans('faq.faqreply') }}</label>
            <textarea class="form-control" id='txtr' name='txtr' >
                            {{$infofaq->faqreply}}
                        </textarea>
          </div>
          
         <p class="text-center"> <button type="submit" class="btn btn-default">Submit</button> <a class="btn btn-default" href="{{URL::asset('/admin/faq')}}">Back</a></p>
        </form>
</div>
</section>
   
    @endforeach   
</div>
<script type="text/javascript">
         CKEDITOR.replace( 'txtr',
         {
          customConfig : 'config.js',
          toolbar : 'simple'
          })

</script> 
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