<aside >
    <div id="sidebar" class="nav-collapse " tabindex="5000" style="overflow: hidden; outline: none;">
        <!-- sidebar menu start-->
         <ul class="sidebar-menu" id="nav-accordion">
          
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('alpha/admin/faq') }}">
                <i class="fa fa-question"></i>
                <span>Tất cả FAQ</span>
                </a>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('alpha/admin/faq/add') }}">
                <i class="fa fa-question"></i>
                <span>Thêm FAQ</span>
                </a>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('alpha/admin/faq/list/dele') }}">
                <i class="fa fa-question"></i>
                <span>Các FAQ đã xóa</span>
                </a>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('alpha/admin/news') }}" >
                    <i class="fa fa-book"></i>
                    <span> Tất cả NEWS </span>
                </a>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('alpha/admin/news/list/dele') }}" >
                    <i class="fa fa-book"></i>
                    <span> NEWS Đã Xóa </span>
                </a>
            </li>
            <li class="sub-menu dcjq-parent-li">
                <a href="{{ URL::to('alpha/admin/news/add') }}" >
                    <i class="fa fa-book"></i>
                    <span> Thêm NEWS </span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>