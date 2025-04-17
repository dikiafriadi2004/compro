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
            <li class="menu-item"><a href="{{ route('dashboard') }}">
                    <div class="icon-item"><i data-feather="home"></i></div><span>Dashboard</span>
                </a></li>
            <li class="cdxmenu-title">
                <h5>pages</h5>
            </li>
            <li class="menu-item"><a href="#!">
                    <div class="icon-item"><i data-feather="command"></i></div><span>Post</span><i
                        class="fa fa-angle-down"></i>
                </a>
                <ul class="submenu-list">
                    <li><a href="{{ route('post.index') }}">Posts</a></li>
                    <li><a href="{{ route('categories.index') }}">Categories</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
