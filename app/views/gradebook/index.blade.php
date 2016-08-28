@extends('layouts.master')

@section('title', trans('app.lbl_gradebook_index'))

@section('styles')
<link href="{{ URL::asset('public/css/Spinner.css') }}" rel="stylesheet" type="text/css">
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
<!--<link href="{{ URL::asset('public/css/gradebook_index.css') }}" rel="stylesheet" type="text/css"> -->

<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
<link href="{{ URL::asset('public/css/select2.css') }}" rel="stylesheet" type="text/css"> 

@stop

@section('content')
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
 
    <div id="gradebook-filter" class="fielter">
        <div class="form-group">
            <label class="control-label">{{trans('gradebook_index.lbl_class_name')}}: </label>
            <div class="" style="display:inline">
            <select id='class_id' class="class_id styled hasCustomSelect" style="width:150px">
            <option value="">--None--</option>
            @foreach($classes as $class)
                <option value="{{$class->id}}">{{$class->name}}</option>
            @endforeach
            </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
              <b>{{ trans('app.lbl_gradebook_index') }}</b>
            </header>

            <div class="panel-body" style="display:none">
            <div class="gradebook_content overflow-auto" style="margin-top:0px">

<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->

            </div>
            <div class="gradebook_result overflow-auto">

            </div>
            <div class="modal fade" id="gradebook_detail" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header custom-modal-header">
                            <h3 class="modal-title custom-modal-header"> {{trans('gradebook_index.lbl_markdetail')}}</h3>                                 
                        </div>

                        <div class="modal-body overflow-auto">
                        </div>

                        <div class="modal-footer">
                            <button type="button" id="btn-cancel" class="btn" data-dismiss="modal">{{trans('app.btn_close_text')}}</button>
                        </div>
                    </div>
                </div>
            </div>
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
            </div>
            </section>
        </div>

<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
</div>

@stop

@section('scripts')
    {{ ViewUtil::renderJsLanguage('feedback_add') }}   
    <script src="{{ URL::asset('public/js/select2.min.js') }}"></script>
    @if(App::getLocale() == 'vi') 
        <script src="{{ URL::asset('public/js/select2_locale_vi.js') }}"></script>
    @else
        <script src="{{ URL::asset('public/js/select2_locale_en.js') }}"></script>
    @endif
    <script src="{{ URL::asset('public/js/Spinner.js') }}"></script>  
    <script src="{{ URL::asset('public/js/gradebook_index.js') }}"></script>     
    
@stop