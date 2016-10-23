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
                  <li><a href="{{ route('alpha.elearning.student', [$record->student->classroom->id])}}">{{$record->student->classroom->name}}</a></li>
                  <li><a href="{{ route('alpha.elearning.course', [$record->alpha_student_id])}}">{{$record->student->first_name}}</a></li>

                  <li>{{$record->course_name}}</li>
                </ol>
                </div>
</div>
<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
            <header class="panel-heading" >
                <b> 
                        {{ trans('elearning.lessons') }}
                </b>
                
                
            </header>
            <div class="panel-body">
            <div class="col-md-12">
                    <table  id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
                        <thead>                                   
                            <tr >
                                <th class="text-center" width="5%"><b>#</b></th> 
                                 <th class="text-center" width="10%">
                                    <b>{{ trans('elearning.lessons_skill') }} </b>
                                 </th>                           

                                <th class="text-center" >
                                    <b> 
                                        {{ trans('elearning.lessons_title') }}
                                    </b>
                                 </th> 
                                <th class="text-center" width="5%">
                                    <b>{{ trans('elearning.lessons_passed') }}</b>
                                </th>

                                <th class="text-center" width="5%">
                                    <b>
                                        {{ trans('elearning.lessons_score') }}
                                    </b>
                                </th>
                                <th class="text-center" width="5%"><b>{{ trans('elearning.lessons_level') }}</b></th>
                                <th class="text-center" width="20%" >
                                    <b>
                                    {{ trans('elearning.lessons_submitted') }}
                                    </b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $index => $item )
                            <tr >
                                <td class="text-center" >
                                    {{ $item->id }}
                                </td>                             
                                <td class="text-left" >
                                    {{ $item->skill }}
                                </td>

                                <td class="text-left" >
                                    
                                        {{ $item->title }}
                                   
                                </td> 
                                <td class="text-center" >
                                    @if(($item->passed)==1)
                                    <span class="label label-success">
                                        {{ trans('elearning.lessons_passed_true') }}
                                    </span>
                                    @else
                                    <span class="label label-danger">
                                        {{ trans('elearning.lessons_passed_flase') }}
                                    </span>
                                    @endif
                                </td>
                                
                                <td class="text-center" >
                                    <b>
                                        {{ $item->score }}
                                    </b>
                                </td>
                                <td class="text-center" >
                                    <b>
                                        {{ $item->level }}
                                    </b>
                                </td>      
                                <td class="text-center" >
                                    <b>
                                        {{ SugarUtil::formatDate($item->submitted) }}
                                    </b>
                                </td>                  
                            </tr>

                        </tbody>
                        @endforeach
                    </table>

            </div>
              
            
    </section>
</div>
</div>

@stop