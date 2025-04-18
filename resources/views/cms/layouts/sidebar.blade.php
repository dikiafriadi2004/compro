<aside class="codex-sidebar">
    <div class="logo-gridwrap codex-brand"><a class="codexbrand-logo d-flex" href="index.html"><img class="img-fluid"
                src="{{ asset('backend/assets/images/logo/logo.png') }}" alt="theeme-logo"><span
                class="text-white fs-3 align-middle ms-2 fw-semibold">Rohi</span></a>
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
            <li class="menu-item {{ request()->routeIs('post.*') ? 'active' : '' }}">
                <a href="{{ route('post.index') }}">
                    <div class="icon-item"><i data-feather="file-text"></i></div><span>Posts</span>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}">
                    <div class="icon-item"><i data-feather="file"></i></div><span>Categories</span>
                </a>
            </li>
            <li class="cdxmenu-title">
                <h5>Settings</h5>
            </li>
            <li class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <div class="icon-item"><i data-feather="users"></i></div><span>Users</span>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('config.*') ? 'active' : '' }}">
                <a href="{{ route('config.edit') }}">
                    <div class="icon-item"><i data-feather="settings"></i></div><span>Config</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
