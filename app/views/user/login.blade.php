@extends('layouts.blank')

@section('title', trans('app.page_title'))

@section('styles')
<!--   1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
<link href="{{ URL::asset('public/theme/css/bootstrap.min.css') }}" rel="stylesheet">     
<link href="{{ URL::asset('public/theme/css/bootstrap-reset.css') }}" rel="stylesheet">     
<link href="{{ URL::asset('public/theme/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">     
<link href="{{ URL::asset('public/theme/css/style.css') }}" rel="stylesheet">     
<link href="{{ URL::asset('public/theme/css/style-responsive.css') }}" rel="stylesheet">     
<style type="text/css">
    #login_content{
        background: url({{ URL::asset('public/img/bg_girl.jpg') }}) no-repeat;
    } 
    #login_content div.row div.title-logo{
        text-align: center
    }
    #login_content form.form-signin{
        padding-top: 10px;
        margin: 0px;
    }
    /*
    .form-signin{
        margin-top: 0!important;
        
    }
    
    #login_content #wrapper{
        margin-top: 0!important;
        padding-top: 50px!important;
        padding-left: 150px!important;
    }
    .login-footer{
        background-color: #e59886!important;
    }
    .login-footer .footer-top{
        display: none;
    }
    */
    body{
        background: #e59886;
    }
    

</style>
@stop

@section('content')
<div id = "login_content">
    <div class="row" style="height:700px">
        <div class="title-logo col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div id="logo">
                    <img src="{{ URL::asset('/public/img/logo_apollo.png') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" style="width: 160px; height: auto"/>
                </div>  
                <div id="description">

                </div>          
        </div>
        <div class="sign-in col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="sign-in-extra col-lg-5 col-md-5 col-sm-3 col-xs-12">
            </div>
            <div class="sign-in-form col-lg-5 col-md-5 col-sm-7 col-xs-12">
            <form class="form-signin " action="" method="post">
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
            </div>

            <div class="change-lang col-lg-2 col-md-2 col-sm-2 col-xs-12">           
                <ul id="lang-chooser">
                    <li class="lang-en @if(App::getLocale() == 'en') active @endif">
                        <a href="{{ URL::to('user/switchLanguage') }}?lang=en" hreflang="en" title="English"><span>English</span></a>
                    </li>
                    <li class="lang-vi @if(App::getLocale() == 'vi') active @endif">
                        <a href="{{ URL::to('user/switchLanguage') }}?lang=vi" hreflang="vi" title="Tiếng Việt"><span>Tiếng Việt</span></a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div id="footer" class="login-footer">
            @include('layouts.footer')
            </div>
         </div>
    </div>
</div>

@stop

@section('scripts')

    {{ ViewUtil::renderJsLanguage('user_login') }}

    <script src="{{ URL::asset('public/js/user_login.js') }}"></script>
     
@stop