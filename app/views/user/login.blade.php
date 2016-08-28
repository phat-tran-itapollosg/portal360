@extends('layouts.blank')

@section('title', trans('app.page_title'))

@section('styles')
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
<link href="{{ URL::asset('public/css/user_login.css') }}" rel="stylesheet">   
<link href="{{ URL::asset('public/theme/css/bootstrap.min.css') }}" rel="stylesheet">     
<link href="{{ URL::asset('public/theme/css/bootstrap-reset.css') }}" rel="stylesheet">     
<link href="{{ URL::asset('public/theme/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">     
<link href="{{ URL::asset('public/theme/css/style.css') }}" rel="stylesheet">     
<link href="{{ URL::asset('public/theme/css/style-responsive.css') }}" rel="stylesheet">     
    
<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
@stop

@section('content')
<div id = 'header_image'>
    <a href="{{Config::get('app.url')}}">
        <img src="../public/img/apollo_portal_poster.png" height="auto" width="100%">
    </a>
</div>
<div id = "login_content">
    <div id="wrapper">
        <div id="header">
            <h1>{{ trans('app.app_title') }}</h1>
            <ul id="lang-chooser">
                <li class="lang-en @if(App::getLocale() == 'en') active @endif">
                    <a href="{{ URL::to('user/switchLanguage') }}?lang=en" hreflang="en" title="English"><span>English</span></a>
                </li>
                <li class="lang-vi @if(App::getLocale() == 'vi') active @endif">
                    <a href="{{ URL::to('user/switchLanguage') }}?lang=vi" hreflang="vi" title="Tiếng Việt"><span>Tiếng Việt</span></a>
                </li>
            </ul>
        </div>
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
        <form class="form-signin" action="" method="post">
        <!--<h2 class="form-signin-heading">sign in now</h2>-->
        <div id="about" class="round10">
                <div id="logo">
                    <img src="{{ URL::asset('/public/img/logo_apollo.png') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" style="width: 160px; height: auto"/>
<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
                </div>  
                <div id="description">

                </div>
            </div> 
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
        <div class="login-wrap">
            <input type="text" id="username" class="form-control" placeholder="{{ trans('user_login.customer_id') }}" name="username" value="{{ $username }}" autofocus>
            <input type="password" id="password" class="form-control" name="password" value="{{ $password }}" placeholder="{{ trans('user_login.password') }}">
            <label class="checkbox">
                <input type="checkbox" id="remember_me" name="remember_me" value="1">{{ trans('user_login.remember_me') }}
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit" id="submit" name="submit" value="{{ trans('user_login.login') }}">{{ trans('user_login.login') }}</button>
        </div>
        <div class="error">
            @if($result == 'not_for_portal')
            {{ trans('user_login.account_is_not_a_customer_error_msg') }}
            @elseif($result == 'login_failed')
            {{ trans('user_login.login_failed_error_msg') }}
            @endif
        </div>
      </form>
            
<!--   [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
    </div>
</div>
<div id="footer">
    @include('layouts.footer')
    </div>
@stop

@section('scripts')

    {{ ViewUtil::renderJsLanguage('user_login') }}

    <script src="{{ URL::asset('public/js/user_login.js') }}"></script>
     
@stop