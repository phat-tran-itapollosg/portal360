<aside id="sidebar" class="sidebar c-overflow">
    <div class="profile-menu">
        <a href="{{ URL::to('user/profile') }}">
            <div class="profile-pic">
                <img src="{{ URL::asset('public/img/customer-avatar.png') }}" alt="">
            </div>

            <div class="profile-info">
                {{ Session::get('contact')->last_name }} {{ Session::get('contact')->first_name }}

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
        <li class="@if (Request::is('project/*')) active @endif">
            <a href="{{ URL::to('/project/index') }}"><i class="zmdi zmdi-home"></i> {{ trans('app.projects') }}</a>
        </li>
        <li class="@if (Request::is('contract/*')) active @endif">
            <a href="{{ URL::to('/contract/index') }}"><i class="zmdi zmdi-home"></i> {{ trans('app.contracts') }}</a>
        </li>
        <li class="@if (Request::is('billing/*')) active @endif">
            <a href="{{ URL::to('/billing/index') }}"><i class="zmdi zmdi-home"></i> {{ trans('app.billings') }}</a>
        </li>
		<li class="@if (Request::is('student/*')) active @endif">
            <a href="{{ URL::to('/student/index') }}"><i class="zmdi zmdi-face"></i> {{ trans('app.students') }}</a>
        </li>
        <li class="sub-menu @if (Request::is('complaint/*')) active @endif">
            <a href="#"><i class="zmdi zmdi-view-compact"></i> {{ trans('app.complaints') }}</a>

            <ul>
                <li><a href="{{ URL::to('/complaint/index') }}">{{ trans('app.complaint_list') }}</a></li>
                <li><a href="{{ URL::to('/complaint/add') }}">{{ trans('app.send_complaint') }}</a></li>
            </ul>
        </li>
        <li class="sub-menu @if (Request::is('ticket/*')) active @endif">
            <a href="#"><i class="zmdi zmdi-view-compact"></i> {{ trans('app.tickets') }}</a>

            <ul>
                <li><a href="{{ URL::to('/ticket/index') }}">{{ trans('app.ticket_list') }}</a></li>
                <li><a href="{{ URL::to('/ticket/add') }}">{{ trans('app.send_ticket') }}</a></li>
            </ul>
        </li>
    </ul>
</aside>