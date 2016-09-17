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
                        {{ trans('elearning.lessons') }} 
                        
                </b>
                
                
            </header>
            <div class="panel-body">
            <div class="col-md-12">
                    <table  id="data-table" class="datatable table table-bordered table-hover table-striped table-vmiddle">
                        <thead>                                   
                            <tr style=" height: 55px ">
                                <th class="text-center" width="5%"><b>#</b></th> 
                                 <th class="text-center" width="10%">
                                    <b>{{ trans('elearning.lessons_skill') }} </b>
                                 </th>                           

                                <th class="text-center" width="25%">
                                    <b> 
                                        {{ trans('elearning.lessons_title') }}
                                    </b>
                                 </th> 
                                <th class="text-center" width="20%">
                                    <b>{{ trans('elearning.lessons_passed') }}</b>
                                </th>

                                <th class="text-center" width="20%">
                                    <b>
                                        {{ trans('elearning.lessons_score') }}
                                    </b>
                                </th>
                                <th class="text-center" width="10%"><b>{{ trans('elearning.lessons_level') }}</b></th>
                                <th class="text-center" width="20%" >
                                    <b>
                                    {{ trans('elearning.lessons_created_at') }}
                                    </b>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($GetLessonsByID as $index => $item )
                            <tr style=" height: 55px ">
                                <th class="text-center" width="5%">
                                    {{ $item->id }}
                                </th>                             
                                <th class="text-center" width="10%">
                                    {{ $item->score }}
                                </th>

                                <th class="text-center" width="25%">
                                    <b>
                                        {{ $item->title }}
                                    </b>
                                </th> 
                                <th class="text-center" width="20%">
                                    @if(($item->passed)==1)
                                    <span class="label label-success">
                                        {{ trans('elearning.lessons_passed_true') }}
                                    </span>
                                    @else
                                    <span class="label label-danger">
                                        {{ trans('elearning.lessons_passed_flase') }}
                                    </span>
                                    @endif
                                </th>
                                
                                <th class="text-center" width="20%">
                                    <b>
                                        {{ $item->score }}
                                    </b>
                                </th>
                                <th class="text-center" width="10%" >
                                    <b>
                                        {{ $item->level }}
                                    </b>
                                </th>      
                                <th class="text-center" width="20%">
                                    <b>
                                        {{ $item->created_at }}
                                    </b>
                                </th>                  
                            </tr>

                        </tbody>
                        @endforeach
                    </table>

            </div>
              
            
    </section>
</div>
</div>

@stop