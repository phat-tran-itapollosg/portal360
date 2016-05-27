@extends('layouts.master')

@section('title', trans('student_index.page_title'))

@section('styles')
   
@stop

@section('content')

    @foreach($students as $student)
		{{ $student['name'] }} 
		@if($student['name'] == 'trung') <font color="red">bug</font> @endif
		<br/>
	@endforeach
	
@stop

@section('scripts')

@stop