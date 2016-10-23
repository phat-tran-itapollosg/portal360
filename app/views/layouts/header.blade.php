 <!-- 1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
<!--header start-->
<style type="text/css">
  .top-nav ul.top-menu li.dropdown p{
    background-color: #fff;
  }
  ul.top-menu .dropdown-menu.extended li{
    font-size: 12px;
  }
  ul.top-menu .dropdown-menu.extended li a{
    border-bottom: none;
  }
</style>
<header id="header" class="header white-bg clearfix">
      <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
    <!--logo start-->
    <a href="{{ URL::to('/home') }}" class="logo">Apollo<span>360</span></a>
    <!--logo end-->
    @if(Session::get('contact') AND Session::get('contact')->last_name != '')
    <div class="top-nav">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                     @if(Session::get('contact') AND Session::get('contact')->picture != '')
                    <img src="{{ Config::get('app.service_config.server_url') }}/index.php?entryPoint=getAvatar&id={{Session::get('contact')->picture}}&type=SugarFieldImage&isTempFile=1" alt="" style="height:29px;">
                     @else
                    <img src="{{ URL::asset('public/img/customer-avatar.png') }}" alt="" style="height:29px;">
                     @endif
                      @if(Session::get('contact') AND Session::get('contact')->last_name != '')
                    <span class="username">{{ Session::get('contact')->first_name }}</span>
                    @endif
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><p><a href="{{ URL::to('user/profile') }}"><i class=" fa fa-suitcase"></i><br>{{ trans('app.view_profile') }}</a></p></li>
                    <!-- <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li> -->
                    <li><p><a href="{{ URL::to('user/changePassword') }}""><i class="fa fa-bell-o"></i> <br>{{ trans('app.change_password') }}</a></p></li>
                    <li><p><a href="{{ URL::to('user/switchLanguage') }}?lang=en" class="@if(App::getLocale() == 'en') hidden @endif"><i class="fa fa-exchange"></i><br>English</a><a href="{{ URL::to('user/switchLanguage') }}?lang=vi" class="@if(App::getLocale() == 'vi') hidden @endif"><i class="fa fa-exchange"></i><br>Tiếng Việt</a></p></li>
                    <li><a href="{{ URL::to('user/logout') }}"><i class="fa fa-key"></i> {{ trans('app.logout') }}</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
    @endif
</header>
<!--header end-->

