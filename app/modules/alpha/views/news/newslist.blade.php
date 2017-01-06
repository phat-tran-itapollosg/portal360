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
    <form id="target" action="{{URL::asset('admin/news/check/')}}" method="post">
        <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
                <b>
                    {{ trans('news.heading') }}
                </b>
                <a class="btn btn-default btn-xs" target="_blank" href="{{ URL::to('admin/news/add') }}" role="button">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
                
                <!-- <span class="glyphicon glyphicon-minus"> -->
                    <!-- <input class="btn btn-default btn-xs" type="submit" value="Submit"> -->
                <button class="btn btn-default btn-xs" onclick="confirmCheckDele()"  style="background-color: #B0B5B9; 
                    " type="submit">
                    <i class="glyphicon glyphicon-repeat"></i> 
                </button>
                <!-- </span> -->
            </header>
            <div class="panel-body">
            <div class="col-lg-8">  
                <h3>{{ trans('news.heading') }} </h3>
                <table id="data-table" class=" table table-bordered table-hover table-striped">
                        <thead>                                   
                            <tr>
                                <th class="text-center" width="5%"><b>#</b></th>
                                <th class="text-center" width="2%"><b>#</b></th>
                                <th class="text-center" width="2%"><b>On/Off</b></th>                          
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

                                    <td>
                                        
                                        <input onclick="checkboxchage()" name="{{$item->id}}" id="checkbox" value="{{$item->id}}"
                                         type="checkbox">
                                    </td>
                                    <td>
                                        @if(($item->ndelete) == 1)
                                            
                                                <span class="label label-danger"> Off </span>
                                            
                                        @elseif(($item->ndelete) == 0)
                                            
                                                <span class="label label-success"> On </span>
                                        @endif  

                                    </td>    

                                    <td class="text-center">
                                        @if(!empty($item->img)) 
                                        <img height="64px" src="{{URL::asset('public/images')}}/{{$item->img}}">
                                        @else
                                        <img height="64px" src="{{ URL::asset('public/img/favicon_apollo.png') }}">
                                        @endif
                                       
                                    </td>
                                    <td class="text-left">
                                    @if(!empty($item->lang)) 
                                            <span class="label label-success">
                                            {{ trans('faq.en') }} 
                                            </span>&nbsp;
                                            <a href="{{ URL::to('admin/news/edit') }}/{{$item->id}}" target="_blank">{{ $item->ntitle }}
                                            </a>
                                            
                                        @else
                                            <span class="label label-primary">
                                            {{ trans('faq.vi') }} 
                                            </span> &nbsp;
                                            <a href="{{ URL::to('admin/news/edit') }}/{{$item->id}}" target="_blank">{{ $item->ntitle }}

                                        @endif           
                                    
                                    </td>
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
                                <a href="{{ URL::to('admin/news/category/edit') }}/{{$item->nid}}" target="_blank">{{ $item -> ccontents }}</a>
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
    <form>
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
    //check 

    function confirmCheckDele() {
        // body...
        
        $( "#target" ).submit(function( event ) {
            
        // alert( "Handler for .submit() called." );
        if(confirm("Bạn có muốn thay đổi trạng thái trên nhũng mục đã chọn "))
        {
            // alert("Change status ");
            return;
        }

        event.preventDefault();
                
        });
    }
    function checkboxchage()
    {
        // $(document).ready(function(){
        //     $('input[type="checkbox"]').click(function(){
        //         if($(this).prop("checked") == true){
        //             alert("Checkbox is checked.");
        //             return;
        //         }
        //         else if($(this).prop("checked") == false){
        //             alert("Checkbox is unchecked.");
        //             return;
        //         }
        //         });
        //     });
    }
</script>
@stop