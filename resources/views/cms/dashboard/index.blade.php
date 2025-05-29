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
                <h1 class="fs-5">Dashboard</h1>
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
    <div class="theme-body" data-simplebar>
        <div class="custom-container common-dash">
            <div class="row">
                <div class="col-xxl-4 col-sm-4 cdx-xxl-50">
                    <div class="card sale-revenue">
                        <div class="card-header">
                            <h4>Total Posts</h4>
                        </div>
                        <div class="card-body progressCounter">
                            <h2><span class="count">{{ $totalPosts }}</span></h2>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-sm-4 cdx-xxl-50">
                    <div class="card sale-revenue">
                        <div class="card-header">
                            <h4>Total Categories</h4>
                        </div>
                        <div class="card-body progressCounter">
                            <h2><span class="count">{{ $totalCategories }}</span></h2>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-sm-4 cdx-xxl-50">
                    <div class="card sale-revenue">
                        <div class="card-header">
                            <h4>Total Users</h4>
                        </div>
                        <div class="card-body progressCounter">
                            <h2><span class="count">{{ $totalUsers }}</span></h2>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 cdx-xxl-50">
                    <div class="card recent-ordertbl">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Slug</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latestPosts as $key => $post)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->slug }}</td>
                                                <td>{{ $post->category_name ?? 'Tidak Ada Kategori' }}</td>
                                                <td class="text-center">
                                                    @if ($post->status == 'publish')
                                                        <span class="badge badge-primary">{{ $post->status }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ $post->status }}</span>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-6 cdx-xxl-50">
                    <div class="card recent-ordertbl">
                        <div class="card-header">
                            <h4>Popular Posts</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Slug</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Views</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($popularPosts as $key => $post)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->slug }}</td>
                                                <td>{{ $post->category_name ?? 'Tidak Ada Kategori' }}</td>
                                                <td class="text-center">
                                                    @if ($post->status == 'publish')
                                                        <span class="badge badge-primary">{{ $post->status }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ $post->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ $post->views }}</td>
                                            </tr>
                                        @endforeach
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
