@extends('cms.layouts.app')

@section('title')
    Pages List
@endsection

@push('css')
<style>
    li {
        list-style: none;
    }
</style>
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Pages List</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Pages List</a></li>
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
                            <h4>Pages List</h4>
                            <div class="row">

                                <div class="mailreact-right">
                                        <a href="{{ route('pages.create') }}" class="btn btn-secondary float-end mb-2">Add
                                            Page</a>
                                    <ul class="mailreact-list">
                                        <li>
                                            <form action="{{ route('pages.index') }}" method="GET">
                                                <div class="input-group">
                                                    <div class="input-group-text cdxappsearch-toggle"><i
                                                            data-feather="search"></i>
                                                    </div>
                                                    <input class="form-control" type="text" id="search" name="search"
                                                        placeholder="Search...">
                                                </div>
                                            </form>
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
                                            <th class="text-center">#</th>
                                            <th class="text-center">Title</th>
                                            <th class="text-center">Slug</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pages as $key => $page)
                                            <tr>
                                                <td class="text-center">{{ $pages->firstItem() + $key }}</td>
                                                <td>{{ $page->title }}</td>
                                                <td>{{ $page->slug }}</td>
                                                <td>
                                                    <div class="text-center">
                                                        <form id="delete-form-{{ $page->id }}"
                                                            action="{{ route('pages.destroy', ['page' => $page->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')

                                                                <a href="{{ route('pages.edit', ['page' => $page->id]) }}"
                                                                    class="text-primary p-2">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>

                                                                <a href="#" class="text-danger p-2"
                                                                    onclick="confirmDelete({{ $page->id }}, '{{ $page->title }}')">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                        </form>
                                                    </div>
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-2">
                                {{ $pages->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: "{{ session('error') }}",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    <script>
        function confirmDelete(postId, postTitle) {
            Swal.fire({
                title: 'Are you sure you want to delete?',
                text: `Post "${postTitle}" will be permanently deleted!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + postId).submit();
                }
            });
        }
    </script>

@endpush
