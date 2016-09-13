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
    
    #login_content div.row div.title-logo{
        text-align: center
    }
    #login_content #logo_2{
        float: left;
        margin: 10px 60px 60px 20px;
    }
    #login_content .background{
        position: fixed;
    }
    #login_content .middle_content{
        height: 700px;
    }

     #login_content .background_2{
        position: fixed;

    }

    #login_content .title-logo{
        margin-top: 20px;
    }
    #login_content form.form-signin
    {
        margin: 20px;
    }

    #login_content .addition_info{
        background: #41cac0;
        height: 100px; 
        width:100%;
        font-family: cursive;
        position: relative;
        padding: 20px 20px 20px 50px;
    }

    #login_content .addition_info .info{
        padding-top: 15px;
        color: #ffffff;
    }
    #login_content .addition_info .info a{
       color: #ffffff;
    }
    @media screen and (max-width: 780px) {
        #login_content .addition_info {
            height: 230px!important;
            text-align: center;
        }
        .addition-info-row{
            position: relative!important;
        }
    }
    @media screen and (max-width: 760px) and (min-width: 500px) {
        #login_content .sign-in {
            padding-left: 25%;
        }
    }

    body{
        background: #e59886;
        overflow-x: hidden;
    }
    .change_lang{
        text-align: right!important;
    }
    .change_lang a{
        color: #fff!important;
    }
    .addition_info{
        height: 45px!important;
        padding: 0 20px 0 50px!important;
    }
    .addition-info-row{
        padding: 0;
        margin: 0;
        width: 100%;
        bottom:0;
        position: fixed;
    }
</style>
@stop

@section('content')
<div id = "login_content">
    <div class="background visible-lg-block visible-md-block visible-sm-block hidden-xs">
        <img src="{{ URL::asset('public/img/bg_girl.jpg') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" style="width: 100%; height: auto"/>
    </div>
    <div class="background_2 hidden-lg hidden-md hidden-sm visible-xs-block">
        <img src="{{ URL::asset('public/img/bg_girl.jpg') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" style="width: 150%; height: auto"/>
    </div>
    
    <div class="row middle_content">
        <div class="title-logo col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div id="logo" class="visible-lg-block visible-md-block visible-sm-block hidden-xs">
                    <img src="{{ URL::asset('/public/img/logo_apollo.png') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" style="width: 160px; height: auto"/>
                </div> 
                <div id="logo_2" class="hidden-lg hidden-md hidden-sm-block visible-xs-block">
                    <img src="{{ URL::asset('/public/img/logo_apollo.png') }}" alt="Trung Tâm Anh Ngữ Quốc Tế Apollo" style="width: 90px; height: auto; float:left"/>
                </div>  
                <div id="description">

                </div>          
        </div>
        <div class="hidden-xs col-lg-4 col-md-4 col-sm-3">
        </div>
        <div class="sign-in col-lg-4 col-md-4 col-sm-5 col-xs-12">
            <form class="form-signin" action="" method="post">
            <h2 class="form-signin-heading">{{ trans('user_login.login') }}</h2>     
                     
                <div class="login-wrap">

                    <p class="change_lang">
                        <span class="btn-group btn-group-xs" role="group" aria-label="Extra-small button group"> 
                            <a type="button" href="{{ URL::to('user/switchLanguage') }}?lang=en" class="btn btn-default @if(App::getLocale() == 'en') btn-info @endif">English</a> 
                            <a type="button" href="{{ URL::to('user/switchLanguage') }}?lang=vi" class="btn btn-default @if(App::getLocale() == 'vi') btn-info @endif" >Tiếng Việt</a>
                        </span>
                    </p>

                    <input type="text" id="username" class="form-control" placeholder="{{ trans('user_login.customer_id') }}" name="username" value="{{ $username }}" autofocus>
                    <input type="password" id="password" class="form-control" name="password" value="{{ $password }}" placeholder="{{ trans('user_login.password') }}">
                    <label class="checkbox">
                        <input type="checkbox" id="remember_me" name="remember_me" value="1"> {{ trans('user_login.remember_me') }}
                    </label>
                    <p >
                    @if($result == 'not_for_portal')
                    {{ trans('user_login.account_is_not_a_customer_error_msg') }}
                    @elseif($result == 'login_failed')
                    {{ trans('user_login.login_failed_error_msg') }}
                    @endif
                </p> 
                    <button class="btn btn-lg btn-login btn-block" type="submit" id="submit" name="submit" value="{{ trans('user_login.login') }}">{{ trans('user_login.login') }}</button>
                </div>
            
                
            </form>            
        </div>
    </div>
<!--     <div class="row addition-info-row">
        <div class="addition_info" style="">
            
             <div class="info col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <a href="">System requirements</a>
            </div>
             <div class="info col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <a href="">Help/Support</a>
            </div>
             <div class="info col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <a href="">Privacy Policy</a>
            </div>
             <div class="info col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <a href="">Service status</a>
            </div>
            <div class="info col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <a href="">Powered by E-learn</a>
            </div>
            <div class="info col-lg-2 col-md-2 col-sm-2 col-xs-12">
            </div>
        </div>
    </div> -->
</div>


@stop

@section('scripts')

    {{ ViewUtil::renderJsLanguage('user_login') }}

    <script src="{{ URL::asset('public/js/user_login.js') }}"></script>
     
@stop