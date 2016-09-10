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
            <!-- <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('admin/faq/add') }}">
                <i class="fa fa-question"></i>
                <span>Thêm FAQ</span>
                </a>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('admin/faq/list/dele') }}">
                <i class="fa fa-question"></i>
                <span>Các FAQ đã xóa</span>
                </a>
            </li> -->
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('admin/news') }}" >
                    <i class="fa fa-book"></i>
                    <span> {{ trans('news.heading') }} </span>
                </a>
            </li>
            
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>