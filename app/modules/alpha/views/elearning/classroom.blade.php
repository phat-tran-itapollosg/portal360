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
                  <li>{{$classroom->name}}</li>
                </ol>
                </div>
</div>

<div class='row'>
    <div class="col-lg-12">  
    <section class="panel panel-default">
            <header class="panel-heading" >
                <b> 
                        {{ trans('elearning.students') }}
                </b>
                
                
            </header>
            <div class="panel-body">
            <div class="col-md-12">
                    <table  id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
                        <thead>                                   
                            <tr >
                                <th class="text-center" width="5%"><b>#</b></th>                             
                                <th class="text-center" ><b>{{ trans('elearning.students_login') }}</b></th>
                                <th class="text-center" width="15%"><b>{{ trans('elearning.students_first_name') }}</b></th>
                                <th class="text-center" width="15%"><b>{{ trans('elearning.students_last_name') }}</b></th>
                                <th class="text-center" width="15%"><b>{{ trans('elearning.students_email') }}</b></th>
                                <th class="text-center" width="5%">{{ trans('elearning.courses_heading') }}</th>

                                <th class="text-center" width="5%"></th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $students as $index => $item )
                            <tr>
                                <td class="text-center" >
                                    {{ $index +1 }}
                                </td>                             
                                <td class="text-left" >
                                    {{ $item->login }}
                                </td>
                                <td class="text-left" >
                                    {{ $item->first_name }}
                                </td>
                                
                                <td class="text-left">
                                    {{ $item->last_name }}
                                </td>

                                <td class="text-left" >
                                    {{ $item->email }}
                                </td>
                                <td class="text-center" >
                                    {{ $item->courses()->where('alpha_delete', '=', '0')->count() }}
                                </td>

                                <td class="text-center" >
                                    <div class="dropdown">
                                      <button id="student-{{ $item->alpha_student_id }}" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-cog"></span>
                                        
                                      </button>
                                      <ul class="dropdown-menu pull-right" aria-labelledby="student-{{ $item->alpha_student_id }}">                                
                                        <li><a href="{{ route('alpha.elearning.course', [$item->alpha_student_id])}}" target="_blank">{{ trans('elearning.courses_heading') }}</a></li>
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

@stop