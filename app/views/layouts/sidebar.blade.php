<!-- 1e1413e10f011dfebcc6b900cffce8e8da2906d0 -->
<aside >
@if(Session::get('contact') AND Session::get('contact')->last_name != '')
    <div id="sidebar" class="nav-collapse " tabindex="5000" style="overflow: hidden; outline: none;">
        <!-- sidebar menu start-->
        
        <ul class="sidebar-menu" id="nav-accordion">

            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/news') }}" class="dcjq-parent">
                    <i class="fa fa-book"></i>
                    <span>{{ trans('app.news') }}</span>
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
                    <i class="fa fa-sitemap"></i>
                    <span>{{ trans('app.booking') }}</span>
                <span class="dcjq-icon"></span></a>
                <ul class="sub" style="display: none;">
                    <li><a href="{{ URL::to('/booking') }}" class="text-capitalize">{{ trans('app.booking_view') }}</a></li>
                    <li><a href="{{ URL::to('/booking/history') }}" class="text-capitalize">{{ trans('app.booking_history') }}</a></li>
                </ul>
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
                  <a href="{{ URL::to('/sms/index') }}" >
                      <i class="fa fa-laptop"></i>
                      <span>{{ trans('app.sms') }}</span>
                  </a>
            </li>      
            
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/gradebook/index') }}" >
                    <i class="fa fa-laptop"></i>
                    <span>{{ trans('app.lbl_gradebook_index') }}</span>
                </a>
            </li>

            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/payment/index') }}" class="dcjq-parent">
                    <i class="fa fa-tasks"></i>
                    <span>{{ trans('payment.page_title') }}</span>
                </a>
            </li>

            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/faq') }}" class="dcjq-parent">
                    <i class="fa fa-question"></i>
                    <span>{{ trans('app.faq') }}</span>
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

           <!--  <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('/survey') }}" class="dcjq-parent">
                    <i class="fa fa-list"></i>
                    <span>{{ trans('app.survey') }}</span>
                </a> 
            </li> -->
            
        </ul>
        
        <!-- sidebar menu end-->
    </div>
<!--  [SVN] r6072 | trung | 2016-08-12 09:21:28 +0700 (T6, 12 Th08 2016) | -->
</aside>
@endif