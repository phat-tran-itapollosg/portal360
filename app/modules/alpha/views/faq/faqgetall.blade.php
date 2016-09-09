<!--
 *
 *Alpha team Tran Tan Phat
 *trantanphat.it@gmail.com
 *
 */
-->
@extends('layout.layout_master')
@section('layout_content')

<link rel="stylesheet" href="{{ URL::asset('public/css/css.css' )}}">
<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
                <b> 
                    {{ trans('faq.heading') }} 
                </b>
                
                <a class="btn btn-default btn-xs" target="_blank" href="{{ URL::to('admin/faq/add') }}" role="button"><span class="glyphicon glyphicon-plus"></span></a>
            </header>
            <div class="panel-body">
                <table id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
                    <thead>                                   
                        <tr>
                            <th class="text-center" width="5%"><b>#</b></th>                             
                            <th class="text-center" width="20%"><b>{{ trans('faq.img') }}</b></th>
                            <th class="text-center" ><b>{{ trans('faq.faqquestion') }}</b></th>
                            <th class="text-center" width="10%"><b>{{ trans('faq.faqdate') }}</b></th>
                            
                            <th width="5%"></th>   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faqdelget as $index => $item)
                            
                            <tr>
                                <td>{{$item->id}}</td>                                 
                                <td class="text-center">
                                    
                                    @if(count($item->img) > 0) 
                                    <img height="64px" src="{{URL::asset('public/img/faq')}}/{{$item->img}}">
                                    @else
                                    <img height="64px" src="{{ URL::asset('public/img/favicon_apollo.png') }}">
                                    @endif
                                   
                                </td>
                                <td class="text-left">{{ $item->faqquestion }}</td>
                                <td class="text-center">{{ $item->faqdate }}</td>
                                <td class="text-center">
                                
                                <div class="dropdown">
                                      <button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownMenu-{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="glyphicon glyphicon-cog"></span>
                                      </button>
                                      <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu-{{$item->id}}">
                                        <li><a href="{{ URL::to('admin/faq/edit') }}/{{$item->id}}" target="_blank">{{ trans('faq.edit') }}</a></li>
                                        <li><a href="{{ URL::to('admin/faq/del') }}/{{$item->id}}" target="_blank">{{ trans('faq.delete') }}</a></li>
                                        <li><a href="" target="_blank">{{ trans('faq.updateImage') }}</a></li>
                                        
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