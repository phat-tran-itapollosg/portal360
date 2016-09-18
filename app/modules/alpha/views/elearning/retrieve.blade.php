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
                    {{ trans('elearning.retrieve_study_record') }} 
                </b>
                
                
            </header>
            <div class="panel-body">
                <h4>{{ trans('elearning.classroom') }} : {{$classroom['name']}}.</h4>
                <p><strong>{{ trans('elearning.classroom_total_pages') }}: </strong>{{ $classroom['total_pages'] }}.</p>
                <p><strong>{{ trans('elearning.classroom_per_page') }}:</strong> {{ $classroom['per_page'] }}.</p>
                <p><strong>{{ trans('elearning.classroom_created_at') }}:</strong> {{ $classroom['created_at']}}.</p>
                <p><strong>{{ trans('elearning.classroom_updated_at') }}:</strong> {{ $classroom['updated_at']}}.</p>

                <p><strong>{{ trans('elearning.count_students') }}:</strong>  {{$count_students}}.</p>
                <p><strong>{{ trans('elearning.count_courses') }}:</strong>  {{$count_courses}}.</p>
                <p><strong>{{ trans('elearning.count_lessons') }}:</strong>  {{$count_lessons}}.</p>
            </div>
            
    </section>
</div>
</div>

@stop