<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
    <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">
        @php
    $name = Session::get('user_name');
    if($name){
        echo '<h4>'. $name . '</h4>';
    }

@endphp
    </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="fas fa-list"></i>
                <p>
                    Phòng ban
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/departments/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách phòng ban</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/departments/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm phòng ban</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">
                    <i class="fas fa-users"></i>
                <p>
                    Tài Khoản
                    <i class="fas fa-angle-left right"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/admin/users/list" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Danh sách người dùng</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/users/add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Thêm tài khoản mới</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/users/reset" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Cấp lại mật khẩu</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-link">
                <a href="/logout">
                    <i class="fa-sharp fa-solid fa-right-from-bracket"></i>
                    <p>
                        Đăng Xuất
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>