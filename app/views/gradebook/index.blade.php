@extends('layouts.master')

@section('title', trans('app.lbl_gradebook_index'))

@section('styles')
<link href="{{ URL::asset('public/css/Spinner.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('public/css/gradebook_index.css') }}" rel="stylesheet" type="text/css"> 
 
@stop

@section('content')

<div class="container">
    <div class="block-header">
        <h2>{{ trans('app.lbl_gradebook_index') }}</h2>
    </div>

    <div class="card">
        <div class="card-body card-padding">
            <div class="fielter">
                {{trans('gradebook_index.lbl_class_name')}}
                <select id='class_id' class="class_id form-control">
                    <option value="">--None--</option>
                    @foreach($classes as $class)
                    <option value="{{$class->id}}">{{$class->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="gradebook_content">

            </div>
            <div class="gradebook_result">

            </div>
            <div class="modal fade" id="gradebook_detail" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title"> {{trans('gradebook_index.lbl_markdetail')}}</h4>                                 
                        </div>

                        <div class="modal-body">
                        </div>

                        <div class="modal-footer">
                            <button type="button" id="btn-cancel" class="btn" data-dismiss="modal">{{trans('app.btn_close_text')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    {{ ViewUtil::renderJsLanguage('feedback_add') }}   
    <script src="{{ URL::asset('public/js/Spinner.js') }}"></script>  
    <script src="{{ URL::asset('public/js/gradebook_index.js') }}"></script>  
    
@stop