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
                {{ trans('news.heading') }}
            </b>
            <a class="btn btn-default btn-xs" target="_blank" href="{{ URL::to('admin/news/add') }}" role="button"><span class="glyphicon glyphicon-plus"></span></a>
        </header>
        <div class="panel-body">
        <div class="col-lg-8">  
            <h3>{{ trans('news.heading') }} </h3>
            <table id="data-table" class=" table table-bordered table-hover table-striped">
                    <thead>                                   
                        <tr>
                            <th class="text-center" width="5%"><b>#</b></th>                             
                            <th class="text-center" width="20%"><b>{{ trans('news.img') }}</b></th>
                            <th class="text-center" ><b>{{ trans('news.title') }}</b></th>
                            <th class="text-center .visible-xs-block, hidden-xs" width="10%"><b>{{ trans('news.date') }}</b></th>
                            <th width="5%"></th>   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getfaq1 as $index => $item)
                            <tr>
                                <td>{{$item->id}}</td>                                 
                                <td class="text-center">
                                    @if(!empty($item->img)) 
                                    <img height="64px" src="{{URL::asset('public/images')}}/{{$item->img}}">
                                    @else
                                    <img height="64px" src="{{ URL::asset('public/img/favicon_apollo.png') }}">
                                    @endif
                                   
                                </td>
                                <td class="text-left">{{ $item->ntitle }}</td>
                                <td class="text-center .visible-xs-block, hidden-xs">{{ $item->ndate }}</td>
                                <td class="text-center">
                                
                                <div class="dropdown">
                                      <button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownMenu-{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="glyphicon glyphicon-cog"></span>
                                      </button>
                                      <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu-{{$item->id}}">
                                        <li><a href="{{ URL::to('admin/news/edit') }}/{{$item->id}}" target="_blank">{{ trans('news.edit') }}
                                        </a></li>
                                        <li>
                                            <a onclick="confirmdelefaq({{$item->id}})" target="_blank">{{ trans('news.delete') }}
                                            </a>
                                        </li>
                                        <li><a href="{{ URL::to('admin/news/add') }}" target="_blank">
                                        {{ trans('news.add') }}
                                        </a></li>
                                        <li><a href=" {{ URL::to(route('alpha.news.updateimgnews',$item->id))}} " target="_blank">{{ trans('news.updateImage') }}</a></li>
                                      </ul>
                                    </div>
                                </td>         
                            </tr>
                        @endforeach
                    </tbody>
                </table>   
            </div>
            <div class="col-lg-4">  
                <h3>{{ trans('news.category') }} </h3>
                <table id="data-table" class="table table-bordered table-hover table-striped">
            <thead>                                   
                <tr>
                    <th class="text-center" width="5%"><b>#</b></th>                        
                    <th class="text-center" ><b>{{ trans('news.category') }}</b></th>
                    
                    <th width="5%">
                        <a type="button" class="btn btn-default btn-sm" href="{{ URL::to('admin/news/category/add') }}" target="_blank">{{ trans('faq.add') }}
                        </a>
                    </th>   
                </tr>
            </thead>
            <tbody>
                     
                @foreach($getCategoryNews as $index => $item)
                            
                    <tr>
                        <td>{{$item->nid}}</td>                                 
                        <td class="text-left">
                            {{ $item -> ccontents }}
                        </td>
                        <td class="text-center">
                            <div class="dropdown">
                              <button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownMenu-{{$item->nid}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="glyphicon glyphicon-cog"></span>
                              </button>
                              <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu-{{$item->nid}}">
                                <li><a href="{{ URL::to('admin/news/category/edit') }}/{{$item->nid}}" target="_blank">{{ trans('news.edit') }}</a></li>
                                <li>
                                    <a onclick="confirmdele({{$item->nid}});" target="_blank">{{ trans('news.delete') }}
                                    </a>
                                    
                                </li>
                                <li><a href="{{ URL::to('admin/news/category/add') }}" target="_blank">{{ trans('news.add') }}</a></li>
                              </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
            </div>

        </div>
        
	</section>
    </div>
</div>
<script>
    function confirmdele($id)
    {
        var note= confirm(" {{ trans('error.confirmdele') }} ");
        if (note) 
        {
            window.location.href = "{{ URL::to('admin/news/category/del') }}/"+$id;
             
        }    
    }
    function confirmdelefaq($id)
    {
        var note= confirm(" {{ trans('error.confirmdele') }} ");
        if (note) 
        {
            window.location.href = "{{ URL::to('admin/news/del') }}/"+$id;
             
        }   
    }
    
</script>
@stop