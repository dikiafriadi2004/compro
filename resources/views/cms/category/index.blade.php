@extends('cms.layouts.app')

@section('title')
    Categories List
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Categories List</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Categories List</a></li>
                    {{-- <li class="breadcrumb-item"><a class="text-light" href="#!">Default</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <div class="row">
                <div class="col-xl-4 col-md-5 cdx-xl-40">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Category</h4>
                        </div>
                        <div class="card-body">
                            <div class="info-group">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">Category</label>
                                        <input class="form-control @error('name') is-invalid @enderror" name="name"
                                            type="text" placeholder="Name Category" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-0">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-md-7 cdx-xl-60">
                    <div class="card project-summarytbl">
                        <div class="card-header">
                            <h4>Categories</h4>
                            <div class="row">

                                <div class="mailreact-right">
                                    <ul class="mailreact-list">
                                        <li>
                                            <form action="{{ route('categories.index') }}" method="GET">
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
                                            <th class="text-center">Name Category</th>
                                            <th class="text-center">Slug</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key => $category)
                                            <tr>
                                                <td class="text-center">{{ $categories->firstItem() + $key }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>
                                                    <div class="text-center">
                                                        <form id="delete-form-{{ $category->id }}"
                                                            action="{{ route('categories.destroy', ['category' => $category->id]) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn text-primary p-2" type="button"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalCategory{{ $category->id }}"><i
                                                                    class="fa fa-edit"></i></button>
                                                            <a href="#" class="btn text-danger p-2"
                                                                onclick="event.preventDefault(); confirmDelete({{ $category->id }}, '{{ $category->name }}')">
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
                                {{ $categories->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('cms.category.edit')
@endsection

@push('js')
    {{-- Success Alert --}}
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

    {{-- Error Alert --}}
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

    {{-- Confirm Delete --}}
    <script>
        function confirmDelete(categoryId, categoryName) {
            Swal.fire({
                title: 'Are you sure you want to delete?',
                text: `Category "${categoryName}" will be permanently deleted!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + categoryId).submit();
                }
            });
        }
    </script>
@endpush
