@extends('cms.layouts.app')

@section('title')
    Dashboard
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Default</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="#!">Default</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body common-dash" data-simplebar>
        <div class="custom-container">
            <div class="row">
                <div class="col-xxl-6">
                    <div class="row">
                        <div class="col-xxl-12 col-lg-6">
                            <div class="card welcome-card overflow-hidden">
                                <div class="card-body">
                                    <div class="row gy-4">
                                        <div class="col-sm-7 order-1 order-sm-0">
                                            <h3 class="mb-2">Welcome to Rohi</h3>
                                            <p class="fs-6">Congratulations! Your account has been Setup and you are ready
                                                to configure your dashboard now.Configuration only take a couple of seconds.
                                            </p><a class="btn btn-primary btn-sm mt-3" href="#!">Upgrad Plan</a>
                                        </div>
                                        <div class="col-sm-5"><img class="img-fluid"
                                                src="backend/assets/images/dashboard/welcome-banner.png"
                                                alt="welcome banner"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-12 col-lg-6">
                            <div class="card visitor-performance">
                                <div class="card-header">
                                    <h4>Visitors Performance</h4>
                                    <div class="setting-card action-menu">
                                        <div class="action-toggle"><i class="codeCopy" data-feather="more-horizontal"></i>
                                        </div>
                                        <ul class="action-dropdown">
                                            <li><a href="#!"><i class="fa fa-calendar-o"></i>weekly</a></li>
                                            <li><a href="#!"><i class="fa fa-calendar-check-o"></i>monthly</a></li>
                                            <li><a href="#!"><i class="fa fa-calendar"></i>yearly</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="visitor-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6">
                    <div class="card project-summarytbl">
                        <div class="card-header">
                            <h4>Project Detail</h4>
                            <div class="setting-card action-menu">
                                <div class="action-toggle"><i class="codeCopy" data-feather="more-horizontal"></i></div>
                                <ul class="action-dropdown">
                                    <li><a href="#!"><i class="fa fa-calendar-o"></i>weekly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar-check-o"></i>monthly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar"></i>yearly</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Project Name</th>
                                            <th>Project Cost</th>
                                            <th>Project Status</th>
                                            <th>Payment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Racing Game</td>
                                            <td>$45,376</td>
                                            <td>Completed</td>
                                            <td><span class="badge badge-primary">Done</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Cytrust Dashboard</td>
                                            <td>$40,258</td>
                                            <td>In Progress</td>
                                            <td><span class="badge badge-secondary">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Travel App</td>
                                            <td>$32,256</td>
                                            <td>Completed</td>
                                            <td><span class="badge badge-primary">Done</span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Reyalestet App</td>
                                            <td>$25,058</td>
                                            <td>In Progress</td>
                                            <td><span class="badge badge-secondary">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Agriculture Website</td>
                                            <td>$36,585</td>
                                            <td>In Progress</td>
                                            <td> <span class="badge badge-secondary">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>TRavel Website</td>
                                            <td>$25,255</td>
                                            <td>Completed</td>
                                            <td> <span class="badge badge-primary">Done</span></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Reyalestet App</td>
                                            <td>$25,058</td>
                                            <td>In Progress</td>
                                            <td><span class="badge badge-secondary">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Agriculture Website</td>
                                            <td>$36,585</td>
                                            <td>In Progress</td>
                                            <td> <span class="badge badge-secondary">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>TRavel Website</td>
                                            <td>$25,255</td>
                                            <td>Completed</td>
                                            <td> <span class="badge badge-primary">Done</span></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>TRavel Website</td>
                                            <td>$25,255</td>
                                            <td>Completed</td>
                                            <td> <span class="badge badge-primary">Done</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-5 col-lg-6">
                    <div class="card countri-tbl">
                        <div class="card-header">
                            <h4>viewed Countries</h4>
                            <div class="setting-card action-menu">
                                <div class="action-toggle"><i class="codeCopy" data-feather="more-horizontal"></i></div>
                                <ul class="action-dropdown">
                                    <li><a href="#!"><i class="fa fa-calendar-o"></i>weekly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar-check-o"></i>monthly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar"></i>yearly</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table tblbody-p0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="badgeavtar bg-primary">UK</div>
                                                    <div class="media-body ms-2">United Kingdom</div>
                                                </div>
                                            </td>
                                            <td class="text-success">48.00%<i class="fa fa-angle-down ms-2"></i></td>
                                            <td> Nove/22</td>
                                            <td>905k</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="badgeavtar bg-secondary">US</div>
                                                    <div class="media-body ms-2">United states</div>
                                                </div>
                                            </td>
                                            <td class="text-success">30.7%<i class="fa fa-angle-up ms-2"></i></td>
                                            <td> Sep/15</td>
                                            <td>750k </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="badgeavtar bg-success">EG</div>
                                                    <div class="media-body ms-2">Egypt</div>
                                                </div>
                                            </td>
                                            <td class="text-danger">25.7%<i class="fa fa-angle-down ms-2"></i></td>
                                            <td>Jun/16</td>
                                            <td>598k </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="badgeavtar bg-warning">IN</div>
                                                    <div class="media-body ms-2">India</div>
                                                </div>
                                            </td>
                                            <td class="text-success">35.00%<i class="fa fa-angle-up ms-2"></i></td>
                                            <td>Sep/17</td>
                                            <td>320k </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="badgeavtar bg-info">MA</div>
                                                    <div class="media-body ms-2">Makedonia</div>
                                                </div>
                                            </td>
                                            <td class="text-success">48.00%<i class="fa fa-angle-down ms-2"></i></td>
                                            <td>Octo/20</td>
                                            <td>748k </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="badgeavtar bg-danger">NI</div>
                                                    <div class="media-body ms-2">Niue</div>
                                                </div>
                                            </td>
                                            <td class="text-danger">28.07%<i class="fa fa-angle-down ms-2"></i></td>
                                            <td>Sep/18</td>
                                            <td>580k </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-7 col-lg-6">
                    <div class="card earning-chart">
                        <div class="card-header">
                            <h4>Site Impression</h4>
                            <div class="setting-card action-menu">
                                <div class="action-toggle"><i class="codeCopy" data-feather="more-horizontal"></i></div>
                                <ul class="action-dropdown">
                                    <li><a href="#!"><i class="fa fa-calendar-o"></i>weekly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar-check-o"></i>monthly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar"></i>yearly</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="site-impres mt-2">
                                <h2><span class="counter">82545</span></h2>
                                <p class="text-light">5.5% change from yesterday</p>
                            </div>
                            <div id="earning-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card project-status">
                                        <div class="card-header">
                                            <h4>Expenses</h4>
                                            <div class="setting-card action-menu">
                                                <div class="action-toggle"><i class="codeCopy"
                                                        data-feather="more-horizontal"></i></div>
                                                <ul class="action-dropdown">
                                                    <li><a href="#!"><i class="fa fa-calendar-o"></i>weekly</a></li>
                                                    <li><a href="#!"><i
                                                                class="fa fa-calendar-check-o"></i>monthly</a></li>
                                                    <li><a href="#!"><i class="fa fa-calendar"></i>yearly</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body progressCounter">
                                            <div class="media">
                                                <div>
                                                    <h2>$<span class="count ms-2">3238</span></h2>
                                                </div>
                                                <div class="media-body"> <span class="badge badge-success">25.7%<i
                                                            class="fa fa-angle-up"></i></span></div>
                                            </div>
                                            <div class="progress progress-primary">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="58"
                                                    aria-valuemin="0" aria-valuemax="100"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card project-status">
                                        <div class="card-header">
                                            <h4>New Users</h4>
                                            <div class="setting-card action-menu">
                                                <div class="action-toggle"><i class="codeCopy"
                                                        data-feather="more-horizontal"></i></div>
                                                <ul class="action-dropdown">
                                                    <li><a href="#!"><i class="fa fa-calendar-o"></i>weekly</a></li>
                                                    <li><a href="#!"><i
                                                                class="fa fa-calendar-check-o"></i>monthly</a></li>
                                                    <li><a href="#!"><i class="fa fa-calendar"></i>yearly </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body progressCounter">
                                            <div class="media">
                                                <div>
                                                    <h2>$<span class="count ms-2">4850</span></h2>
                                                </div>
                                                <div class="media-body"> <span class="badge badge-secondary">25.7%<i
                                                            class="fa fa-angle-down"></i></span></div>
                                            </div>
                                            <div class="progress progress-secondary">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="88"
                                                    aria-valuemin="0" aria-valuemax="100"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card project-status">
                                        <div class="card-header">
                                            <h4>New Clients</h4>
                                            <div class="setting-card action-menu">
                                                <div class="action-toggle"><i class="codeCopy"
                                                        data-feather="more-horizontal"></i></div>
                                                <ul class="action-dropdown">
                                                    <li><a href="#!"><i class="fa fa-calendar-o"></i>weekly</a></li>
                                                    <li><a href="#!"><i
                                                                class="fa fa-calendar-check-o"></i>monthly</a></li>
                                                    <li><a href="#!"><i class="fa fa-calendar"></i>yearly</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body progressCounter">
                                            <div class="media">
                                                <div>
                                                    <h2>$<span class="count ms-2">4198 </span></h2>
                                                </div>
                                                <div class="media-body"><span class="badge badge-danger">20.5%<i
                                                            class="fa fa-angle-down"></i></span></div>
                                            </div>
                                            <div class="progress progress-info">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="78"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card project-status">
                                        <div class="card-header">
                                            <h4>Employees</h4>
                                            <div class="setting-card action-menu">
                                                <div class="action-toggle"><i class="codeCopy"
                                                        data-feather="more-horizontal"></i></div>
                                                <ul class="action-dropdown">
                                                    <li><a href="#!"><i class="fa fa-calendar-o"></i>weekly</a></li>
                                                    <li><a href="#!"><i
                                                                class="fa fa-calendar-check-o"></i>monthly</a></li>
                                                    <li><a href="#!"><i class="fa fa-calendar"></i>yearly</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-body progressCounter">
                                            <div class="media">
                                                <div>
                                                    <h2>$<span class="count ms-2">1899 </span></h2>
                                                </div>
                                                <div class="media-body"><span class="badge badge-success">15.2%<i
                                                            class="fa fa-angle-up"></i></span></div>
                                            </div>
                                            <div class="progress progress-warning">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="29"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card recent-ordertbl">
                        <div class="card-header">
                            <h4>Order detail</h4>
                            <div class="setting-card action-menu">
                                <div class="action-toggle"><i class="codeCopy" data-feather="more-horizontal"></i></div>
                                <ul class="action-dropdown">
                                    <li><a href="#!"><i class="fa fa-calendar-o"></i>weekly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar-check-o"></i>monthly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar"></i>yearly</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Product</th>
                                            <th>Amount</th>
                                            <th>Vendor</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="img-wrap"><img class="img-fluid"
                                                            src="backend/assets/images/avtar/6.jpg" alt="recent-product">
                                                    </div>
                                                    <div class="media-body">Mark Wangar</div>
                                                </div>
                                            </td>
                                            <td><a href="product-detail.html"> Apple Airpod Pro</a></td>
                                            <td>$847.39</td>
                                            <td>Palestine</td>
                                            <td> <span class="badge badge-primary">Paid</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="img-wrap"><img class="img-fluid"
                                                            src="backend/assets/images/avtar/2.jpg" alt="recent-product">
                                                    </div>
                                                    <div class="media-body">Thomos Vactom</div>
                                                </div>
                                            </td>
                                            <td><a href="product-detail.html">Redmi Note 10s</a></td>
                                            <td>$470.34</td>
                                            <td>Serbia</td>
                                            <td> <span class="badge badge-secondary">Unpaid</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="img-wrap"><img class="img-fluid"
                                                            src="backend/assets/images/avtar/3.jpg" alt="recent-product">
                                                    </div>
                                                    <div class="media-body">Johan Deo</div>
                                                </div>
                                            </td>
                                            <td> <a href="product-detail.html">Razer kraken headset</a></td>
                                            <td>$394.39</td>
                                            <td>Republic</td>
                                            <td> <span class="badge badge-primary">Paid</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="img-wrap"><img class="img-fluid"
                                                            src="backend/assets/images/avtar/4.jpg" alt="recent-product">
                                                    </div>
                                                    <div class="media-body">Leena Odem</div>
                                                </div>
                                            </td>
                                            <td> <a href="product-detail.html">iphone 12 pro max</a></td>
                                            <td>$249.29</td>
                                            <td>Greece</td>
                                            <td> <span class="badge badge-primary">Paid</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="img-wrap"><img class="img-fluid"
                                                            src="backend/assets/images/avtar/5.jpg" alt="recent-product">
                                                    </div>
                                                    <div class="media-body">Omini Rome</div>
                                                </div>
                                            </td>
                                            <td> <a href="product-detail.html">DJL Mavic Pro 2</a></td>
                                            <td>$147.70</td>
                                            <td>Central</td>
                                            <td> <span class="badge badge-secondary">Unpaid</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-6">
                    <div class="card dash-chat">
                        <div class="card-header">
                            <h4>live caht</h4>
                        </div>
                        <div class="card-body">
                            <div class="dash-chatbox">
                                <ul class="chating-list" data-simplebar>
                                    <li>
                                        <div class="user-msgbox">
                                            <div class="media"><img class="img-fluid"
                                                    src="backend/assets/images/avtar/1.jpg" alt="image">
                                                <div class="media-body">
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="admin-msgbox">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p>Adipisicing elit, sed do eiusmod.</p>
                                                </div><img class="img-fluid" src="backend/assets/images/avtar/2.jpg"
                                                    alt="image">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="admin-msgbox">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod.</p>
                                                </div><img class="img-fluid" src="backend/assets/images/avtar/2.jpg"
                                                    alt="image">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="user-msgbox">
                                            <div class="media"><img class="img-fluid"
                                                    src="backend/assets/images/avtar/1.jpg" alt="image">
                                                <div class="media-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="admin-msgbox">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod</p>
                                                </div><img class="img-fluid" src="backend/assets/images/avtar/2.jpg"
                                                    alt="image">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="user-msgbox">
                                            <div class="media"><img class="img-fluid"
                                                    src="backend/assets/images/avtar/1.jpg" alt="image">
                                                <div class="media-body">
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="admin-msgbox">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p>Adipisicing elit, sed do eiusmod.</p>
                                                </div><img class="img-fluid" src="backend/assets/images/avtar/2.jpg"
                                                    alt="image">
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="userchat-typebox d-flex"><a class="btn btn-primary me-2" href="#!"><i
                                            data-feather="smile"></i></a>
                                    <input class="form-control" type="text" placeholder="Type a message"
                                        value="" autocomplete="off"><a class="btn btn-primary ms-2"
                                        href="#!"> <i data-feather="send"> </i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-6">
                    <div class="card visitor-ratetbl">
                        <div class="card-header">
                            <h4>Visitors Statistics</h4>
                            <div class="setting-card action-menu">
                                <div class="action-toggle"><i class="codeCopy" data-feather="more-horizontal"></i></div>
                                <ul class="action-dropdown">
                                    <li><a href="#!"><i class="fa fa-calendar-o"></i>weekly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar-check-o"></i>monthly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar"></i>yearly</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div id="visitor-rank"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-6">
                    <div class="card support-inboxtbl">
                        <div class="card-header">
                            <h4>Support Inbox</h4>
                            <div class="setting-card action-menu">
                                <div class="action-toggle"><i class="codeCopy" data-feather="more-horizontal"></i></div>
                                <ul class="action-dropdown">
                                    <li><a href="#!"><i class="fa fa-calendar-o"></i>weekly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar-check-o"></i>monthly</a></li>
                                    <li><a href="#!"><i class="fa fa-calendar"></i>yearly</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="img-wrap"><img class="img-fluid"
                                                            src="backend/assets/images/avtar/6.jpg" alt="recent-product">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6>Jordan Nt</h6>
                                                        <p class="text-light">My item doesn’t shio to correct address</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-primary">10 hours ago</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="img-wrap"><img class="img-fluid"
                                                            src="backend/assets/images/avtar/2.jpg" alt="recent-product">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6>Carolien Bloeme</h6>
                                                        <p class="text-light">You Shipped Color, i need it to be</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <span class="badge badge-primary">8 hours ago</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="img-wrap"><img class="img-fluid"
                                                            src="backend/assets/images/avtar/3.jpg" alt="recent-product">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6>Lisanne Viscaal</h6>
                                                        <p class="text-light">Can you please refund back my mony</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td> <span class="badge badge-primary">6 hours ago</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="img-wrap"><img class="img-fluid"
                                                            src="backend/assets/images/avtar/4.jpg" alt="recent-product">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6>Sun Jun</h6>
                                                        <p class="text-light">Thank you very much for quick support!</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-primary">4 hours ago</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="img-wrap"><img class="img-fluid"
                                                            src="backend/assets/images/avtar/5.jpg" alt="recent-product">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6>Tolos Joune</h6>
                                                        <p class="text-light">My item doesn’t shio to correct address</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-primary">30 minute ago</span></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="img-wrap"><img class="img-fluid"
                                                            src="backend/assets/images/avtar/4.jpg" alt="recent-product">
                                                    </div>
                                                    <div class="media-body">
                                                        <h6>Sun Jun</h6>
                                                        <p class="text-light">Thank you very much for quick support!</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge badge-primary">4 hours ago</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- apex chart-->
    <script src="{{ asset('backend/assets/js/vendors/chart/apexcharts.js') }}"></script>
    <!-- dashboard-->
    <script src="backend/assets/js/dashboard/dashboard.js"></script>
@endpush
