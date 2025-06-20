<aside class="codex-sidebar">
    <div class="logo-gridwrap codex-brand">
        <a class="codexbrand-logo d-flex" href="{{ route('dashboard') }}">
            <img class="img-fluid" src="{{ asset('backend/assets/images/logo/logo.png') }}" style="height: 40px; width: auto" alt="theme-logo">
        </a>
        <div class="sidebar-action"><i data-feather="grid"></i></div>
    </div>

    <div class="codex-menuwrapper">
        <ul class="codex-menu custom-scroll" data-simplebar>

            <!-- DASHBOARD -->
            <li class="cdxmenu-title mt-0"><h5>Dashboards</h5></li>
            <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <div class="icon-item"><i data-feather="home"></i></div><span>Dashboard</span>
                </a>
            </li>

            <!-- CONTENT PAGES -->
            <li class="cdxmenu-title"><h5>Pages</h5></li>

            @can('Posts Show')
                <li class="menu-item {{ request()->routeIs('post.*') ? 'active' : '' }}">
                    <a href="{{ route('post.index') }}">
                        <div class="icon-item"><i data-feather="edit-3"></i></div><span>Posts</span>
                    </a>
                </li>
            @endcan

            @can('Category Show')
                <li class="menu-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}">
                        <div class="icon-item"><i data-feather="layers"></i></div><span>Categories</span>
                    </a>
                </li>
            @endcan

            @can('Pages Show')
                <li class="menu-item {{ request()->routeIs('pages.*') ? 'active' : '' }}">
                    <a href="{{ route('pages.index') }}">
                        <div class="icon-item"><i data-feather="file"></i></div><span>Pages</span>
                    </a>
                </li>
            @endcan

            @can('Landing Show')
                <li class="menu-item {{ request()->routeIs('landing.*') ? 'active' : '' }}">
                    <a href="{{ route('landing.edit') }}">
                        <div class="icon-item"><i data-feather="monitor"></i></div><span>Landing Page</span>
                    </a>
                </li>
            @endcan

            <!-- SETTINGS -->
            @if(auth()->user()->can('User Show') || auth()->user()->can('Role Show') || auth()->user()->can('Config Show'))
                <li class="cdxmenu-title"><h5>Settings</h5></li>
            @endif

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
                        <div class="icon-item"><i data-feather="shield"></i></div><span>Roles</span>
                    </a>
                </li>
            @endcan

            @can('Config Show')
                <li class="menu-item {{ request()->routeIs('config.*') ? 'active' : '' }}">
                    <a href="{{ route('config.edit') }}">
                        <div class="icon-item"><i data-feather="sliders"></i></div><span>Config</span>
                    </a>
                </li>
            @endcan

            @can('Menu Show')
                <li class="menu-item {{ request()->routeIs('menus.*') ? 'active' : '' }}">
                    <a href="{{ route('menus.index') }}">
                        <div class="icon-item"><i data-feather="menu"></i></div><span>Menu Builder</span>
                    </a>
                </li>
            @endcan

        </ul>
    </div>
</aside>
