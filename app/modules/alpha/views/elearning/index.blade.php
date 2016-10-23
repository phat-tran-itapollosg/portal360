<!--
 *
 *Alpha team Pong Pi
 *Eroshaly@gmail.com
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
                    {{ trans('elearning.classroom_heading') }} 
                </b>
                
                
            </header>
            <div class="panel-body">
            <div class="col-md-12">
                    <table  id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
                        <thead>                                   
                            <tr >
                                <th class="text-center" width="5%">
                                    <b>{{ trans('elearning.classroom_id') }}</b>
                                </th> 
                                <th class="text-center" >
                                    <b>{{ trans('elearning.classroom_name') }} </b>
                                </th>                            
                                <th class="text-center" width="10%">
                                    <b>{{ trans('elearning.classroom_total_pages') }}</b>
                                </th>
                                <th class="text-center" width="10%">
                                    <b>{{ trans('elearning.classroom_per_page') }}</b>
                                </th>
                                <th class="text-center" width="10%">
                                    <b> 
                                        {{ trans('elearning.classroom_created_at') }}
                                     </b>
                                 </th>
                                <th class="text-center" width="10%">
                                    <b>
                                        {{ trans('elearning.classroom_updated_at') }}
                                    </b>
                                </th>
                                <th class="text-center" width="10%">
                                    <b>
                                        {{ trans('elearning.classroom_time_retrieve') }}
                                    </b>
                                </th>
                                <th class="text-center" width="5%">
                                    <b>
                                    {{ trans('elearning.students') }}
                                    </b>
                                </th>
                                <th class="text-center" width="5%">
                                    

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($Classroom as $index=>$item )
                            <tr >
                                <td class="text-center" >
                                    {{ $item->id }}
                                </td>                             
                                <td class="text-left">
                                    
                                        {{ $item->name }}
                                    
                                </td>
                                <td class="text-center" >
                                    {{ $item->total_pages }}
                                </td>
                                
                                <td class="text-center" >
                                    {{ $item->per_page }}
                                </td>
                                <td class="text-center" >
                                    {{ SugarUtil::formatDate($item->created_at)}}
                                </td>      
                                <td class="text-center" >
                                    {{ SugarUtil::formatDate($item->updated_at)}}
                                </td> 
                                <td class="text-center" >
                                    {{ $item->time_retrieve}}
                                </td> 
                                <td class="text-center" >
                                    {{ $item->students()->where('alpha_delete', '=', '0')->count()}}
                                </td>  
                                <td class="text-center" >
                                    <div class="dropdown">
                                      <button id="classroom-{{ $item->id }}" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-cog"></span>
                                        
                                      </button>
                                      <ul class="dropdown-menu pull-right" aria-labelledby="classroom-{{ $item->id }}">
                                        <li><a href="{{ route('alpha.elearning.retrieve', [$item->id])}}" target="_blank">{{ trans('elearning.retrieve_study_record') }}</a></li>
                                        <li><a href="{{ route('alpha.elearning.student', [$item->alpha_classroom_id])}}" target="_blank">{{ trans('elearning.students') }}</a></li>
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