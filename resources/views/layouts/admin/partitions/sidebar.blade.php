<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{ route('admin.dashboard.index') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="{{ request()->is('') ? 'active' : null }}">
                    <a href="{{ route('admin.category.index') }}"><i class="fe fe-layout"></i> <span>Quản lý danh mục</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.product.index') }}"><i class="fe fe-layout"></i> <span>Quản lý sản phẩm</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.order.index') }}"><i class="fe fe-layout"></i> <span>Đơn đặt hàng</span></a>
                </li>
                <li>
                    <a href="{{ route('admin.customer.index') }}"><i class="fe fe-layout"></i> <span>Quản lý khách hàng</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-users"></i> <span> Tài khoản </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('admin.user.index') }}">Tài khoản quản trị</a></li>
                        <li><a href="blocked-users.html">Quản lý quyền hạn</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-gear"></i> <span> Cài đặt chung </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="general.html">Thông tin chung</a></li>
                        <li><a href="admob.html"> </a></li>
                        <li><a href="{{ route('admin.setting.index') }}">Sinch Settings </a></li>
                        <li><a href="firebase-settings.html">Firebase Settings </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>