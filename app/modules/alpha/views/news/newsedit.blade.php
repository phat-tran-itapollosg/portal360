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
                    {{ trans('news.edit') }} {{ trans('news.heading') }}
                </b>
            </header>

            </header>
    <div class="panel-body">
        @foreach ($infofaq as $infofaq)
            <form action="{{URL::asset('admin/news/edit/data')}}" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Danh mục</label>
                <select name="idcate" class="form-control">
                        @foreach($cate as $cates)
                            <option value ="{{ $cates->nid }}">{{$cates->ccontents}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{ trans('news.title') }}</label>
                <input class="form-control text-left" type="text" name="txttitle" value=" {{$infofaq->ntitle}}">
                 <input class="lbfaq" type="text" name="id" value="{{$infofaq->id}}" hidden />
              </div>
              <div class="form-group">
                <label for="exampleInputFile">{{ trans('news.contents') }}</label>
                <textarea class="form-control" id='txtcontent' name='txtcontent' >
                                {{$infofaq->ncontent}}
                </textarea>
              </div>
              
             <p class="text-center"> <button type="submit" class="btn btn-default"> {{ trans('news.submit') }} </button> <a class="btn btn-default" href="{{URL::asset('/admin/news')}}">{{ trans('news.back') }}  </a></p>
            </form>
        @endforeach
    </div>
    </section>
</div>
<script type="text/javascript">
         CKEDITOR.replace( 'txtcontent',
         {
          customConfig : 'config.js',
          toolbar : 'simple'
          })

</script>  
<script type="text/javascript">
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