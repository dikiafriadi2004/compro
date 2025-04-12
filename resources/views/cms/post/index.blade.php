@extends('cms.layouts.app')

@section('title')
    Posts List
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Posts List</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Post List</a></li>
                    {{-- <li class="breadcrumb-item"><a class="text-light" href="#!">Default</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body common-dash" data-simplebar>
        <div class="custom-container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="card project-summarytbl">
                        <div class="card-header">
                            <h4>Posts List</h4>
                            <div class="row">

                                <div class="mailreact-right">
                                        <a href="{{ route('post.create') }}" class="btn btn-secondary float-end mb-2">Add Post</a>
                                    <ul class="mailreact-list">
                                        <li>
                                            <div class="input-group">
                                                <div class="input-group-text cdxappsearch-toggle"><i data-feather="search"></i>
                                                </div>
                                                <input class="form-control" type="text" placeholder="Search mail">
                                            </div>
                                        </li>
                                    </ul>
                                    
                                </div>
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
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
