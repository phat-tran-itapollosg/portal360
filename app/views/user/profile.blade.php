@extends('layouts.master')

@section('title', trans('user_profile.page_title'))

@section('styles')
        
@stop

<!--  1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
@section('content')   
<!-- page start-->
  <div class="row">
      <aside class="profile-nav col-lg-3">
          <section class="panel">
              <div class="user-heading round">
                  <a href="#">
                        
                        <img src="{{ Config::get('app.service_config.server_url') }}/index.php?entryPoint=getAvatar&id={{Session::get('contact')->picture}}&type=SugarFieldImage&isTempFile=1" alt="">
                     
                  </a>
                  <h1>{{ Session::get('contact')->last_name }} {{ Session::get('contact')->first_name }}</h1>
                  <p>{{ Session::get('user')->user_name }}</p>
              </div>
<!--
              <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="{{ URL::to('user/profile') }}"> <i class="fa fa-user"></i> {{ trans('app.view_profile') }}</a></li>
              </ul>
              -->
              <ul class="nav nav-pills nav-stacked">
                <li>
                    <a><b><i class="fa fa-map-marker"></i>  {{ trans('user_profile.address') }}:</b> {{ $user->address_street }}</a>
                </li>     
                <li>
                    <a><b><i class="fa fa-envelope"></i>  {{ trans('user_profile.email') }}:</b> {{ $user->email1 }}</a>
                </li>     
                <li>
                    <a><b><i class="fa fa-mobile-phone"></i>  {{ trans('user_profile.mobile_phone') }}:</b> {{ $user->phone_mobile }}</a>
                </li>
              </ul>
                                                        
          </section>
            <aside>
                                       
           
            </aside>
      </aside>
      <aside class="profile-info col-lg-9">
              <section class="panel panel-default">
              <header class="panel-heading" style="border-radius:0">
                <b>{{ trans('user_profile.page_title') }}</b>
              </header>
              <div class="panel-body bio-graph-info">
                  <form id="form-profile" action="{{ URL::to('user/saveProfile') }}" method="post" class="form-horizontal" role="form">
                      <div class="form-group">
                          <label  class="col-lg-2 control-label"><b>{{ trans('user_profile.customer_id') }}</b></label>
                          <div class="col-lg-6">
                              <input type="text" id="customer_id" name="customer_id" class="form-control" placeholder="{{ trans('user_profile.customer_id') }}" value="{{ $user->user_name }}" disabled>
                          </div>
                      </div>
                      <div class="form-group">
                          <label  class="col-lg-2 control-label"><b>{{ trans('user_profile.first_name') }}</b></label>
                          <div class="col-lg-6">
                              <input type="text" id="first_name" name="first_name" class="form-control" placeholder="{{ trans('user_profile.first_name') }}" value="{{ $user->first_name }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label  class="col-lg-2 control-label"><b>{{ trans('user_profile.last_name') }}</b></label>
                          <div class="col-lg-6">
                              <input type="text" id="last_name" name="last_name" class="form-control" placeholder="{{ trans('user_profile.last_name') }}" value="{{ $user->last_name }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label  class="col-lg-2 control-label"><b>{{ trans('user_profile.address') }}</b></label>
                          <div class="col-lg-6">
                               <input type="text" id="address" name="address"  class="form-control" placeholder="{{ trans('user_profile.address') }}" value="{{ $user->address_street }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label  class="col-lg-2 control-label"><b>{{ trans('user_profile.email') }}</b></label>
                          <div class="col-lg-6">
                              <input type="text" id="email" name="email" class="form-control" placeholder="{{ trans('user_profile.email') }}" value="{{ $user->email1 }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <label  class="col-lg-2 control-label"><b>{{ trans('user_profile.mobile_phone') }}</b></label>
                          <div class="col-lg-6">
                              <input type="text" id="mobile_phone" name="mobile_phone"  class="form-control" placeholder="{{ trans('user_profile.mobile_phone') }}" value="{{ $user->phone_mobile }}">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary btn-sm m-t-10">{{ trans('app.btn_save_text') }}</button>
                          </div>
                      </div>
                  </form>
                  
              </div>
          </section>                      
      </aside>
  </div>

  <!-- page end-->
<!--  [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
@stop

@section('scripts')

    {{ ViewUtil::renderJsLanguage('user_profile') }}
    
    <script src="{{ URL::asset('public/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('public/js/user_profile.js') }}"></script>
<!--  1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
    <script src="{{ URL::asset('public/theme/assets/jquery-knob/js/jquery.knob.js') }}"></script>
<!--  [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->

    @if(Session::has('flash_message'))
        <script type="text/javascript">
            Notification.notify('{{ Session::get('flash_message') }}', 'success');
        </script>
    @endif
         
@stop