<aside class="codex-sidebar">
    <div class="logo-gridwrap codex-brand"><a class="codexbrand-logo d-flex" href="index.html"><img class="img-fluid"
                src="{{ asset('backend/assets/images/logo/logo.png') }}" style="height: 40px; width: auto" alt="theeme-logo"></a>
        <div class="sidebar-action"><i data-feather="grid"> </i></div>
    </div>
    <div class="codex-menuwrapper">
        <ul class="codex-menu custom-scroll" data-simplebar>
            <li class="cdxmenu-title mt-0">
                <h5>Dashboards</h5>
            </li>
            <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"><a
                    href="{{ route('dashboard') }}">
                    <div class="icon-item"><i data-feather="home"></i></div><span>Dashboard</span>
                </a></li>
            <li class="cdxmenu-title">
                <h5>pages</h5>
            </li>
            @can('Posts Show')
                <li class="menu-item {{ request()->routeIs('post.*') ? 'active' : '' }}">
                    <a href="{{ route('post.index') }}">
                        <div class="icon-item"><i data-feather="file-text"></i></div><span>Posts</span>
                    </a>
                </li>
            @endcan
            @can('Category Show')
                <li class="menu-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}">
                        <div class="icon-item"><i data-feather="file"></i></div><span>Categories</span>
                    </a>
                </li>
            @endcan
            <li class="cdxmenu-title">
                <h5>Settings</h5>
            </li>
            @can('User Show')
                <li class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <div class="icon-item"><i data-feather="users"></i></div><span>Users</span>
                    </a>
                </li>
            @endcan
            @can('Role Show')
                <li class="menu-item {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}">
                        <div class="icon-item"><i data-feather="users"></i></div><span>Roles</span>
                    </a>
                </li>
            @endcan
            @can('Config Show')
                <li class="menu-item {{ request()->routeIs('config.*') ? 'active' : '' }}">
                    <a href="{{ route('config.edit') }}">
                        <div class="icon-item"><i data-feather="settings"></i></div><span>Config</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</aside>
