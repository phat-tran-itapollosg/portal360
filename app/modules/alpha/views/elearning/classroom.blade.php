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
                        {{ trans('elearning.retrieve_heading') }} 
                </b>
                
                
            </header>
            <div class="panel-body">
            <div class="col-md-12">
                    <table  id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
                        <thead>                                   
                            <tr style=" height: 55px ">
                                <th class="text-center" width="5%"><b>#</b></th>                             
                                <th class="text-center" width="20%"><b>{{ trans('elearning.classroom_name') }}</b></th>
                                <th class="text-center" width="20%"><b>{{ trans('elearning.classroom_date') }}</b></th>
                                <th class="text-center" width="20%"><b>#</b></th>
                                <th class="text-center" ><b>{{ trans('elearning.students') }}</b></th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $getClassRoom as $index => $item )
                            <tr style=" height: 55px ">
                                <th class="text-center" width="5%">
                                    {{ $item->classroom_id }}
                                </th>                             
                                <th class="text-center" width="20%">
                                    {{ $item -> name }}
                                </th>
                                <th class="text-center" width="20%">
                                    @if(($item->updated_at)>0)
                                        {{ $item->updated_at }}
                                
                                    @else
                                        {{ $item->created_at }}
                                    @endif
                                </th>
                                
                                <th class="text-center" width="20%">
                                    {{ $item -> student_id }}
                                </th>
                                <th class="text-center" >
                                    <a href="{{ URL::asset(route('alpha.elearning.courses',$item->student_id)) }}">
                                        {{ $item ->first_name }}&nbsp{{ $item->last_name }}
                                    </a>
                                </th>                        
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>
              
            
    </section>
</div>
</div>

@stop