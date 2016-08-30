<aside >
    <div id="sidebar" class="nav-collapse " tabindex="5000" style="overflow: hidden; outline: none;">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <div class="profile-menu">
                  <a href="{{ URL::to('user/profile') }}">
                      <div class="profile-pic">
                          <!--
                          @if(Session::get('contact')->picture != '')
                              <img src="" alt="">
                          @else
                              <img src="" alt="">
                          @endif
                          -->
                          Admin Prolife
                      </div>
                      <!--
                      <div class="profile-info">
                          {{ Session::get('contact')->last_name }} {{ Session::get('contact')->first_name }} ({{ Session::get('user')->user_name }})
                          <i class="zmdi zmdi-caret-down"></i>
                      </div>
                      -->
                  </a>

                  <ul class="main-menu">
                  <!--
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
                  -->
              </div>
            </li>
            <li>
              <div class="profile-menu">
                    <a href="{ URL::to('#') }">
                        <div class="profile-pic">
                          <i class="fa fa-cogs"></i>
                          <span>Quản lý FAQ</span>  
                        </div>
                    </a>

                    <ul class="main-menu">
                        <li>
                            <a id="menu-profile" href="{{ URL::asset('alpha/admin/faq/add') }} ">
                            <i class="fa fa-book"></i>
                            <span>Thêm FAQ</span>
                            </a>
                        </li>
                        <li>
                            <a id="menu-change-pasword" href="{{ URL::asset('alpha/admin/faq/edit') }}">
                            <i class="fa fa-book"></i>
                            <span>Sửa FAQ</span>
                            </a>
                        </li>
                        <li>
                            <a id="menu-logout" href="{{URL::asset('alpha/admin/faq/del/get')}}">
                            <i class="fa fa-book"></i>
                            <span>Các tin đã Xóa</span>
                            </a>
                        </li>
                          
                    </ul>
                </div>
            </li>
            <!--
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/faq') }}" class="dcjq-parent">
                    <i class="fa fa-info-circle"></i>
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
                <a href="#" class="dcjq-parent">
                    <i class="fa fa-cogs"></i>
                    <span>{{ trans('app.feedback') }}</span>
                <span class="dcjq-icon"></span>
                </a> 
                <ul class="sub" style="display: none;">
                    <li><a href="{{ URL::to('/feedback/add') }}">{{ trans('app.send_feedback') }}</a></li>
                    <li><a href="{{ URL::to('/feedback/index') }}">{{ trans('app.history_feedback') }}</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>