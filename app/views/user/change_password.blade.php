@extends('layouts.master')

@section('title', trans('user_change_password.page_title'))

@section('styles')
        
@stop

@section('content')
<!-- 1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-default">
            <header class="panel-heading" style="border-radius:0">
              <b>{{ trans('user_change_password.page_title') }}</b>
            </header>
            
            <div class="panel-body">
                <div class="card">
                    <div class="card-body card-padding">
                        <form id="form-change-password" class="form-horizontal" action="{{ URL::to('user/savePassword') }}" method="post">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('user_change_password.current_password') }}</label>
                                <div class="col-sm-10">
                                    <input type="password" id="current_password" name="current_password" class="form-control" placeholder="{{ trans('user_change_password.current_password') }}" value="{{ $current_password }}">
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('user_change_password.new_password') }}</label>
                                <div class="col-sm-10">
                                    <input type="password" id="new_password" name="new_password" class="form-control" placeholder="{{ trans('user_change_password.new_password') }}" value="{{ $new_password }}">
                                </div>
                            </div>

                    

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ trans('user_change_password.confirm_password') }}</label>
                                <div class="col-sm-10">
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="{{ trans('user_change_password.confirm_password') }}" value="{{ $confirm_password }}">
                                </div>
                            </div>

                            
                            <button type="submit" class="btn btn-primary" style="margin-left:50%">{{ trans('app.btn_save_text') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
<!--  [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
        </div>
    </div>

@stop

@section('scripts')

    {{ ViewUtil::renderJsLanguage('user_change_password') }}

    <script src="{{ URL::asset('public/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/user_change_password.js') }}"></script>
    
    @if(Session::has('error_message'))
        <script type="text/javascript">
            Notification.notify('{{ Session::get('error_message') }}', 'danger');
        </script>
    @endif
    
    @if(Session::has('success_message'))
        <script type="text/javascript">
            Notification.notify('{{ Session::get('success_message') }}', 'success');
        </script>
    @endif
@stop