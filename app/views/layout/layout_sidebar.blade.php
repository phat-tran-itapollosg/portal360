<aside >
    <div id="sidebar" class="nav-collapse " tabindex="5000" style="overflow: hidden; outline: none;">
        <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('admin/news') }}" >
                    <i class="fa fa-book"></i>
                    <span> {{ trans('news.heading') }} </span>
                </a>
            </li>
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
                    <i class="fa fa-list"></i>
                    <span>{{ trans('app.login_to_survey') }}</span>
                </a>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="#" class="dcjq-parent">
                    <i class="glyphicon glyphicon-tag"></i>
                    <span>{{ trans('app.elearning') }}</span>
                <span class="dcjq-icon"></span></a>
                <ul class="sub" style="display: none;">
                    <li><a href="{{ route('alpha.elearning.retrieve',[20130])}}" target="_blank">{{ trans('elearning.retrieve_study_record') }} </a>(20130)</li>
                    <li><a href="{{ route('alpha.elearning.index')}}">{{ trans('elearning.classroom') }}</a></li>
                </ul>
            </li>
            
            
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>