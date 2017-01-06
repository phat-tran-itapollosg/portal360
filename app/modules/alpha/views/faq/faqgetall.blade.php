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

    <form id="target" action="{{URL::asset('admin/faq/check/')}}" method="post">
        <section class="panel panel-default">
                <header class="panel-heading" style="border-radius:0">
                    <b> 
                        {{ trans('faq.heading') }} 
                    </b>
                    
                    <a class="btn btn-default btn-xs" target="_blank" href="{{ URL::to('admin/faq/add') }}" role="button"><span class="glyphicon glyphicon-plus"></span></a>
                    <button class="btn btn-default btn-xs" onclick="confirmCheckDele()"  style="background-color: #B0B5B9; 
                    " type="submit">
                    <i class="glyphicon glyphicon-repeat"></i> 
                    </button>
                </header>
                <div class="panel-body">
                <div class="col-md-8">
                        <h3>{{ trans('faq.heading') }} </h3>
                        <table  id="data-table" class=" table table-bordered table-hover table-striped ">
                            <thead>                                   
                                <tr style=" height: 55px ">
                                    <th class="text-center" width="5%"><b>#</b></th>
                                    <th class="text-center" width="2%"><b>#</b></th>
                                    <th class="text-center" width="2%"><b>On/Off</b></th>                                                     
                                    <th class="text-center" width="20%"><b>{{ trans('faq.img') }}</b></th>
                                    <th class="text-center" ><b>{{ trans('faq.faqquestion') }}</b></th>
                                    <th class="text-center .visible-xs-block, hidden-xs" width="10%"><b>{{ trans('faq.faqdate') }}</b></th>
                                    
                                    <th width="5%"></th>  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faqdelget as $index => $item)
                                    <tr>
                                        
                                        <td>{{$item->id}}</td>   
                                        <td>
                                        
                                        <input onclick="checkboxchage()" name="{{$item->id}}" id="checkbox" value="{{$item->id}}"
                                         type="checkbox">
                                        </td>
                                        <td>
                                            @if(($item->faqdelete) == 1)
                                                
                                                    <span class="label label-danger"> Off </span>
                                                
                                            @elseif(($item->faqdelete) == 0)
                                                
                                                    <span class="label label-success"> On </span>
                                            @endif  

                                        </td>                                
                                        <td class="text-center">
                                            
                                            @if(!empty($item->img)) 
                                            <img width="64px" src="{{URL::asset('public/images')}}/{{$item->img}}">
                                            @else
                                            <img height="64px" src="{{ URL::asset('public/img/favicon_apollo.png') }}">
                                            @endif
                                           
                                        </td>

                                        <td class="text-left">
                                        
                                        @if(!empty($item->lang)) 
                                            <span class="label label-success">
                                            {{ trans('faq.en') }} 
                                            </span>&nbsp;
                                            <a href="{{ URL::to('admin/faq/edit') }}/{{$item->id}}" target="_blank">{{ $item->faqquestion }}
                                                    </a>
                                        @else
                                            <span class="label label-primary">
                                            {{ trans('faq.vi') }} 
                                            </span> &nbsp;
                                            <a href="{{ URL::to('admin/faq/edit') }}/{{$item->id}}" target="_blank">{{ $item->faqquestion }}
                                                    </a>
                                        @endif                                   
                                        
                                        
                                        </td>
                                        <td class="text-center .visible-xs-block, hidden-xs">{{ $item->faqdate }}</td>
                                        <td class="text-center">
                                        
                                        <div class="dropdown">
                                              <button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownMenu-{{$item->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="glyphicon glyphicon-cog"></span>
                                              </button>
                                              <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu-{{$item->id}}">
                                                <li>
                                                    <a href="{{ URL::to('admin/faq/edit') }}/{{$item->id}}" target="_blank">{{ trans('faq.edit') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a onclick="confirmdelefaq({{$item->id}})" target="_blank">
                                                    {{ trans('faq.delete') }}
                                                    </a>
                                                </li>
                                                <li><a href="{{ route('alpha.faq.updateimg',$item->id ) }}" target="_blank">{{ trans('faq.updateImage') }}</a></li>
                                                <li>
                                                </li>
                                                <li><a href=" {{URL::to(route('alpha.faq.Fagadd'))}} " target="_blank">{{ trans('faq.add') }}</a></li>
                                              </ul>
                                            </div>
                                        </td>
                      
                                    </tr>
                                   
                                @endforeach
                            </tbody>
                        </table> 
                    </div>  
                    <div class="col-md-4">
                        <h3>{{ trans('faq.category') }} </h3>
                        <table id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
                            <thead>                                   
                                <tr style=" height: 58px " >
                                    <th class="text-center" width="5%"><b>#</b></th>                        
                                    <th class="text-center" ><b>{{ trans('faq.category') }}</b></th>
                                    
                                    <th width="5%"><a type="button" class="btn btn-default btn-sm" href="{{ URL::to('admin/faq/category/add') }}" target="_blank">{{ trans('faq.addcategory') }}
                                    </a></th>   
                                </tr>
                            </thead>
                            <tbody>
                            
                        @foreach($getCateFaq as $index => $item)
                                    
                            <tr >
                                <td>{{$item->cid}}</td>                                 
                                <td class="text-left">
                                    <a href="{{ URL::to('admin/faq/category/edit') }}/{{$item->cid}}" target="_blank">{{ $item -> ccontent }}</a>                                
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                      <button class="btn btn-default dropdown-toggle btn-sm" type="button" id="dropdownMenu-{{$item->cid}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <span class="glyphicon glyphicon-cog"></span>
                                      </button>
                                      <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu-{{$item->cid}}">
                                        <li><a href="{{ URL::to('admin/faq/category/edit') }}/{{$item->cid}}" target="_blank">{{ trans('faq.edit') }}</a></li>
                                        <li>
                                            
                                            <a onclick="confirmdele({{$item->cid}})" target="_blank">
                                            {{ trans('faq.delete') }}
                                            </a>
                                            
                                        </li>
                                        <li><a href="{{ URL::to('admin/faq/category/add') }}" target="_blank">{{ trans('faq.add') }}</a></li>
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
    </form>
</div>
</div>
<script>
    function confirmdele($id)
    {
        var note= confirm(" {{ trans('error.confirmdele') }} ");
        if (note) 
        {
            window.location.href = "{{ URL::to('admin/faq/category/del') }}/"+$id;
             
        }    
    }
    function confirmdelefaq($id)
    {
        var note= confirm(" {{ trans('error.confirmdele') }} ");
        if (note) 
        {
            window.location.href = "{{ URL::to('admin/faq/del') }}/"+$id;
             
        }   
    }
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