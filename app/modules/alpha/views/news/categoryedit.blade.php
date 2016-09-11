
<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
@extends('layout.layout_master')
@section('layout_content')
<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
                <b> 
                    {{ trans('news.edit') }} {{ trans('news.heading') }}
                </b>
            </header>
    <div class="panel-body">
        @foreach($getEditCateFaq as $item)
        <form action="{{URL::asset('admin/news/category/del/data')}}" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1"> {{ trans('news.category') }} </label>
                <input class="form-control text-left" type="text" value=" {{ $item->ccontents }} " name="txtcontent" >
                <input class="form-control text-left" type="hidden" value=" {{ $item->nid }} " name="id" >
            </div>
        @endforeach
        <p class="text-center"> <button type="submit" class="btn btn-default">
            {{ trans('news.submit') }}
        </button> <a class="btn btn-default" href="{{URL::asset('/admin/category')}}">Back</a></p>
        </form>
    </div>
    </section>
    </div>
</div>
@stop