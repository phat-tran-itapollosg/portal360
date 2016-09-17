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
                        {{ trans('elearning.courses_heading') }} 
                        @foreach($getCourses as $index=>$item )
                            {{ $item->first_name }}&nbsp{{ $item->last_name }}

                        @endforeach
                </b>
                
                
            </header>
            <div class="panel-body">
            <div class="col-md-12">
                    <table  id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
                        <thead>                                   
                            <tr style=" height: 55px ">
                                <th class="text-center" width="5%"><b>#</b></th> 
                                 <th class="text-center" width="20%">
                                 <b>{{ trans('elearning.course_name') }} </b>
                                 </th>                            
                                <th class="text-center" width="20%"><b>{{ trans('elearning.courses_created_at') }}</b></th>
                                <th class="text-center" width="20%"><b>{{ trans('elearning.courses_end_date') }}</b></th>
                                <th class="text-center" width="20%">
                                    <b> 
                                        {{ trans('elearning.payment_status') }}
                                     </b>
                                 </th>
                                <th class="text-center" >
                                    <b>
                                    {{ trans('elearning.classroom_name') }}
                                    </b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($getCourses as $index=>$item )
                            <tr style=" height: 55px ">
                                <th class="text-center" width="5%">
                                    {{ $item->alpha_course_id }}
                                </th>                             
                                <th class="text-center" width="20%">
                                    <a href="{{ URL::asset(route('alpha.elearning.lessions',$item->alpha_student_id)) }}">
                                        {{ $item->course_name }}
                                    </a>
                                </th>
                                <th class="text-center" width="20%">
                                    {{ $item->created_at }}
                                </th>
                                
                                <th class="text-center" width="20%">
                                    {{ $item->end_date }}
                                </th>
                                <th class="text-center" >
                                    @if(($item->payment_status)==0)
                                    <span class="label label-danger">
                                        {{ trans('elearning.payment_status_flase') }}
                                    </span>
                                        
                                    @else
                                        <span class="label label-success">
                                            {{ trans('elearning.payment_status_true') }}
                                        </span>
                                    @endif
                                </th>      
                                <th class="text-center" width="20%">
                                    {{ $GetNameClass }}
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