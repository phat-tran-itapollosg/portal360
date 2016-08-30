<aside >
    <div id="sidebar" class="nav-collapse " tabindex="5000" style="overflow: hidden; outline: none;">
        <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
            
            <li>
                <div class="profile-menu">
                  <a href="{{ URL::to('faq/add') }}">
                      <div class="profile-pic">
                        <i class="zmdi zmdi-caret-down"></i>
                      </div>
                      <div class="profile-info">
                          <i class="zmdi zmdi-caret-down"></i>
                          Quản trị FAQ
                      </div>
                  </a>

                  <ul class="main-menu">
                      
                      <li>
                          <a href="{{ URL::to('alpha/admin/faq/add') }}">
                          <i class="zmdi zmdi-lock">Thêm FAQ</a>
                      </li>
                      <li>
                          <a href="{{ URL::to('user/changePassword') }}">
                          <i class="zmdi zmdi-lock">Xóa FAQ</a>
                      </li>
                      <li>
                          <a  href="{{ URL::to('user/logout') }}">
                          <i class="zmdi zmdi-lock-open"></i> Sửa FAQ</a>
                      </li>
                  </ul>
              </div>
            </li>

            <!--
            <li class="sub-menu dcjq-parent-li">
                <a href="#" >
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
                <a href="#" class="dcjq-parent">
                    <i class="fa fa-cogs"></i>
                    <span>{{ trans('app.feedback') }}</span>
                <span class="dcjq-icon"></span></a> 
                <ul class="sub" style="display: none;">
                    <li><a href="{{ URL::to('/feedback/add') }}">{{ trans('app.send_feedback') }}</a></li>
                    <li><a href="{{ URL::to('/feedback/index') }}">{{ trans('app.history_feedback') }}</a></li>
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>