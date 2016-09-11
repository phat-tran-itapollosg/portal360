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
                    {{ trans('faq.add') }} {{trans('faq.category')}} {{trans('faq.heading')}}
                </b>
                <a class="btn btn-default btn-xs" target="_blank" href="{{ URL::to('admin/faq/category/add') }}" role="button"><span class="glyphicon glyphicon-plus"></span></a>
            </header>
    <div class="panel-body">
        <table id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
            <thead>                                   
                <tr>
                    <th class="text-center" width="5%"><b>#</b></th>                        
                    <th class="text-center" ><b>{{ trans('faq.category') }}</b></th>
                    
                    <th width="5%"></th>   
                </tr>
            </thead>
            <tbody>
                @foreach($getCateFaq as $index => $item)
                            
                    <tr>
                        <td>{{$item->cid}}</td>                                 
                        <td class="text-left">
                            {{ $item -> ccontent }}
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                              <button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownMenu-{{$item->cid}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="glyphicon glyphicon-cog"></span>
                              </button>
                              <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu-{{$item->cid}}">
                                <li><a href="{{ URL::to('admin/faq/category/edit') }}/{{$item->cid}}" target="_blank">{{ trans('faq.edit') }}</a></li>
                                <li><a href="{{ URL::to('admin/faq/category/del') }}/{{$item->cid}}" target="_blank">{{ trans('faq.delete') }}</a></li>
                                <li><a href="{{ URL::to('admin/faq/category/add') }}" target="_blank">{{ trans('faq.add') }}</a></li>
                              </ul>
                            </div>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
    </section>
    </div>
</div>
@stop