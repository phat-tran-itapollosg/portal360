<!-- 1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
<aside >
    <div id="sidebar" class="nav-collapse " tabindex="5000" style="overflow: hidden; outline: none;">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <div class="profile-menu">
                  <a href="{{ URL::to('user/profile') }}">
                      <div class="profile-pic">
                          @if(Session::get('contact')->picture != '')
                              <img src="" alt="">
                          @else
                              <img src="" alt="">
                          @endif
                      </div>

                      <div class="profile-info">
                          {{ Session::get('contact')->last_name }} {{ Session::get('contact')->first_name }} ({{ Session::get('user')->user_name }})
                          <i class="zmdi zmdi-caret-down"></i>
                      </div>
                  </a>

                  <ul class="main-menu">
                      <li>
                          <a id="menu-profile" href="{{ URL::to('user/profile') }}"><i class="zmdi zmdi-account"></i> {{ trans('app.view_profile') }}</a>
                      </li>
                      <li>
                          <a id="menu-change-password" href="{{ URL::to('user/changePassword') }}"><i class="zmdi zmdi-lock"></i> {{ trans('app.change_password') }}</a>
                      </li>
                      <li>
                          <a id="menu-logout" href="{{ URL::to('user/logout') }}"><i class="zmdi zmdi-lock-open"></i> {{ trans('app.logout') }}</a>
                      </li>
                  </ul>
              </div>
            </li>

            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/gradebook/index') }}" >
                    <i class="fa fa-laptop"></i>
                    <span>{{ trans('app.lbl_gradebook_index') }}</span>
                </a>
            </li>

            <li class="sub-menu dcjq-parent-li">
                  <a href="{{ URL::to('/sms/index') }}" >
                      <i class="fa fa-laptop"></i>
                      <span>{{ trans('app.sms') }}</span>
                  </a>
            </li>

            <li class="sub-menu dcjq-parent-li">
                <a href="#" class="dcjq-parent">
                    <i class="fa fa-cogs"></i>
                    <span>{{ trans('app.schedule') }}</span>
                <span class="dcjq-icon"></span></a>
                <ul class="sub" style="display: none;">
                    <li><a href="{{ URL::to('/schedule/index') }}">{{ trans('app.schedule_calendar') }}</a></li>
                    <li><a href="{{ URL::to('/schedule/listview') }}">{{ trans('app.schedule_listview') }}</a></li>
                </ul>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/enrollment/index') }}" class="dcjq-parent">
                    <i class="fa fa-tasks"></i>
                    <span>{{ trans('app.enrollment') }}</span>
                </a>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/faq') }}" class="dcjq-parent">
                    <i class="fa fa-question"></i>
                    <span>FAQ</span>
                </a>
            </li>

            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/news') }}" class="dcjq-parent">
                    <i class="fa fa-book"></i>
                    <span>News</span>
                </a>
            </li>

            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/elearning') }}" class="dcjq-parent" target="_blank">
                    <i class="fa fa-sign-in"></i>
                    <span>E-Learning</span>
                </a>
            </li>

            <li class="sub-menu dcjq-parent-li">
                <a href="#" class="dcjq-parent">
                    <i class="fa fa-cogs"></i>
                    <span>{{ trans('app.feedback') }}</span>
                <span class="dcjq-icon"></span></a> 
                <ul class="sub" style="display: none;">
                    <li><a href="{{ URL::to('/feedback/add') }}">{{ trans('app.send_feedback') }}</a></li>
                    <li><a href="{{ URL::to('/feedback/index') }}">{{ trans('app.history_feedback') }}</a></li>
                </ul>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/survey') }}" class="dcjq-parent">
                    <i class="fa fa-list"></i>
                    <span>{{ trans('app.survey') }}</span>
                  
                </a> 
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
<!--  [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
</aside>