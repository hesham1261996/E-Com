    <!-- Sidebar -->
    <ul class="pr-0 navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon">
                <img style="width:35%" src="{!! asset('logo.png') !!}">
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
            <a class="nav-link text-right" href="{{ route('admin.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>لوحة التحكم</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/items') ? 'active' : '' }}">
            <a class="nav-link text-right" href="{{ route('items.index') }}">
                <i class="fas fa-book-open"></i>
                <span>{{ __('العناصر') }}</span>
            </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item {{ request()->is('admin/categories') ? 'active' : '' }}">
            <a class="nav-link text-right" href="{{ route('categories.index') }}">
                <i class="fas fa-folder"></i>
                <span>{{ __('الاقسام') }}</span>
            </a>
        </li>

        @if (auth()->user()->IsSuperAdmin())
            <!-- Nav Item - users -->
            <li class="nav-item {{ request()->is('admin/users') ? 'active' : '' }}">
                <a class="nav-link text-right" href="{{ route('users.index') }}">
                    <i class="fas fa-users"></i>
                    <span>{{ __('المستخدمون') }}</span></a>
            </li>
        @endif

        <!-- Nav Item - roles -->
        @if (auth()->user()->IsSuperAdmin())
            <li class="nav-item {{ request()->is('admin/role') ? 'active' : '' }}">
                <a class="nav-link text-right" href="{{ route('role.index') }}">
                    <i class="fas fa-file"></i>
                    <span>{{ __('الادوار') }}</span>
                </a>
            </li>
        @endif

        @if (auth()->user()->IsSuperAdmin())
            <li class="nav-item {{ request()->is('admin/permission') ? 'active' : '' }}">
                <a class="nav-link text-right" href="{{ route('permissions') }}">
                    <i class="fas fa-lock"></i>
                    <span>{{ __('الصلاحيات') }}</span></a>
            </li>
        @endif

        <li class="nav-item {{ request()->is('admin/purchas*') ? 'active' : '' }}">
            <a class="nav-link text-right" href="{{route('all_purchas')}}">
                <i class="fas fa-shopping-bag"></i>
                <span>{{ __('المشتريات') }}</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
