<aside >
    <div id="sidebar" class="nav-collapse " tabindex="5000" style="overflow: hidden; outline: none;">
        <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
          
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('admin/faq') }}">
                <i class="fa fa-question"></i>
                <span>{{ trans('faq.heading') }}</span>
                </a>
            </li>
            <!--
             <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('admin/faq/category') }}">
                <i class="fa fa-question"></i>
                <span> {{ trans('faq.categoryfaq') }} </span>
                </a>
            </li>-->
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('admin/news') }}" >
                    <i class="fa fa-book"></i>
                    <span> {{ trans('news.heading') }} </span>
                </a>
            </li>
            <!--
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('admin/news/category') }}">
                <i class="fa fa-book"></i>
                <span>{{ trans('news.category') }} {{ trans('news.heading') }} </span>
                </a>
            </li> 
            -->
            </li>

            <li class="sub-menu dcjq-parent-li">
                <a href="{{ route('alpha.survey.index')}}" target="_blank">
                    <i class="fa fa-book"></i>
                    <span>{{ trans('app.login_to_survey') }}</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>