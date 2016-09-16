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
                    {{ trans('elearning.retrieve_heading') }} 
                </b>
                
                
            </header>
            <div class="panel-body">
                <h4>{{ trans('elearning.classroom') }} : {{$classroom['name']}}</h4>
                <p>{{ trans('elearning.count_students') }}: {{$count_students}}</p>
                <p>{{ trans('elearning.count_courses') }}: {{$count_courses}}</p>
                <p>{{ trans('elearning.count_lessons') }}: {{$count_lessons}}</p>
            </div>
            
    </section>
</div>
</div>

@stop