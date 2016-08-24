<!--header start-->
<header id="header" class="header white-bg clearfix">
      <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
    <!--logo start-->
    <a href="index.html" class="logo">Apollo<span>360</span></a>
    <!--logo end-->
    <div class="top-nav ">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                     @if(Session::get('contact')->picture != '')
                    <img src="{{ Config::get('app.service_config.server_url') }}/index.php?entryPoint=getAvatar&id={{Session::get('contact')->picture}}&type=SugarFieldImage&isTempFile=1" alt="" style="height:29px;">
                     @else
                    <img src="{{ URL::asset('public/img/customer-avatar.png') }}" alt="" style="height:29px;">
                     @endif

                    <span class="username">{{ Session::get('contact')->last_name }} {{ Session::get('contact')->first_name }}</span>
                </a>
            </li>
            <!-- user login dropdown end -->
        </ul>
        <!--search & user info end-->
    </div>
</header>
<!--header end-->