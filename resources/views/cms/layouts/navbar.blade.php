<header class="codex-header">
    <div class="header-contian d-flex justify-content-between align-items-center">
        <div class="header-left d-flex align-items-center">
            <div class="sidebar-action navicon-wrap me-2 d-xl-none"><i data-feather="grid"></i></div>
            <div class="search-bar">
                <div class="form-group mb-0">
                    <div class="input-group">
                        <input class="form-control" type="text" value="" placeholder="Search Here....."><span
                            class="input-group-text"><i data-feather="search"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-right d-flex align-items-center justify-content-end">
            <ul class="nav-iconlist">
                <li class="nav-profile">
                    <div class="media">
                        <div class="user-icon"><img class="img-fluid rounded-50"
                                src="{{ asset('backend/assets/images/avtar/3.jpg') }}" alt="logo"></div>
                        <div class="media-body">
                            <h6>Thomas Vactom</h6><span class="text-light">Web designer</span>
                        </div>
                    </div>
                    <div class="hover-dropdown navprofile-drop">
                        <ul>
                            <li><a href="profile.html"><i class="me-2 align-middle"
                                        data-feather="user"></i>profile</a></li>
                            <li><a href="email-inbox.html"><i class="me-2 align-middle"
                                        data-feather="mail"></i>inbox</a></li>
                            <li><a href="user-edit.html"><i class="me-2 align-middle"
                                        data-feather="settings"></i>setting</a></li>
                            <li><a href="login.html"><i class="me-2 align-middle" data-feather="log-out"></i>log
                                    out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
