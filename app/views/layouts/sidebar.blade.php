<aside id="sidebar" class="sidebar c-overflow">
    <div class="profile-menu">
        <a href="{{ URL::to('user/profile') }}">
            <div class="profile-pic">
                <img src="{{ URL::asset('public/img/customer-avatar.png') }}" alt="">
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

    <ul class="main-menu">
        <li class="@if (Request::is('home/*')) active @endif">
            <a href="{{ URL::to('/') }}"><i class="zmdi zmdi-home"></i> {{ trans('app.dashboard') }}</a>
        </li>
        <li class="@if (Request::is('sms/*')) active @endif">
            <a href="{{ URL::to('/sms/index') }}"><i class="zmdi zmdi-comment-outline"></i> {{ trans('app.sms') }}</a>
        </li>
        <li class="@if (Request::is('schedule/*')) active @endif">
            <a href="{{ URL::to('/schedule/index') }}"><i class="zmdi zmdi-calendar-alt"></i> {{ trans('app.schedule') }}</a>
        </li>
		<li class="@if (Request::is('enrollment/*')) active @endif">
            <a href="{{ URL::to('/enrollment/index') }}"><i class="zmdi zmdi-money-box"></i> {{ trans('app.enrollment') }}</a>
        </li>
        <li class="sub-menu @if (Request::is('feedback/*')) active @endif">
            <a href="#"><i class="zmdi zmdi-assignment-o"></i> {{ trans('app.feedback') }}</a>

            <ul>
                <li><a href="{{ URL::to('/feedback/add') }}">{{ trans('app.send_feedback') }}</a></li>
                <li><a href="{{ URL::to('/feedback/index') }}">{{ trans('app.history_feedback') }}</a></li>
            </ul>
        </li>
    </ul>
</aside>