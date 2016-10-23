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
<ol class="breadcrumb">
                  <li><a href="{{ route('alpha.elearning.index')}}">{{ trans('elearning.classroom_heading') }}</a></li>
                  <li><a href="{{ route('alpha.elearning.student', [$record->classroom->id])}}">{{$record->classroom->name}}</a></li>
                  <li>{{$record->first_name}}</li>
                </ol>
                </div>
</div>

<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
            <header class="panel-heading" >
                <b> 
                        {{ trans('elearning.courses_heading') }}
                </b>
                
                
            </header>
            <div class="panel-body">
            <div class="col-md-12">
                    <table  id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
                        <thead>                                   
                            <tr >
                                <th class="text-center" width="5%"><b>#</b></th> 
                                 <th class="text-center" >
                                 <b>{{ trans('elearning.course_name') }} </b>
                                 </th>                            
                                <th class="text-center" width="20%"><b>{{ trans('elearning.courses_created_at') }}</b></th>
                                <th class="text-center" width="20%"><b>{{ trans('elearning.courses_end_date') }}</b></th>
                                <th class="text-center" width="10%">
                                    <b> 
                                        {{ trans('elearning.payment_status') }}
                                     </b>
                                 </th>
                                <th class="text-center" width="5%">
                                    <b> 
                                        {{ trans('elearning.lessons') }}
                                     </b>
                                </th>
                                <th class="text-center" width="5%">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $index=>$item )
                            <tr >
                                <td class="text-center" >
                                    {{ $item->id }}
                                </td>                             
                                <td class="text-left" >
                                    
                                        {{ $item->course_name }}
                                    
                                </td>
                                <td class="text-center" >
                                    {{ SugarUtil::formatDate($item->created_at) }}
                                </td>
                                
                                <td class="text-center" >
                                    {{ SugarUtil::formatDate($item->end_date)}}
                                </td>
                                <td class="text-center" >
                                    @if(($item->payment_status)==0)
                                    <span class="label label-danger">
                                        {{ trans('elearning.payment_status_flase') }}
                                    </span>
                                        
                                    @else
                                        <span class="label label-success">
                                            {{ trans('elearning.payment_status_true') }}
                                        </span>
                                    @endif
                                </td>   
                                <td class="text-center" >
                                    {{ $item->lessons()->where('alpha_delete', '=', '0')->count() }}
                                </td>   
                                <td class="text-center" >
                                    <div class="dropdown">
                                      <button id="course-{{ $item->id }}" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-cog"></span>
                                        
                                      </button>
                                      <ul class="dropdown-menu pull-right" aria-labelledby="course-{{ $item->id }}">                                
                                        <li><a href="{{ route('alpha.elearning.lession', [$item->alpha_course_id])}}" target="_blank">{{ trans('elearning.lessons') }}</a></li>
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