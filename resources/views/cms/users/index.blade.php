@extends('cms.layouts.app')

@section('title')
    Users List
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Users List</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Users List</a></li>
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
                            <h4>Users List</h4>
                            <div class="row">

                                <div class="mailreact-right">
                                    <a href="{{ route('users.create') }}" class="btn btn-secondary float-end mb-2">Register</a>
                                    <ul class="mailreact-list">
                                        <li>
                                            <form action="{{ route('users.index') }}" method="GET">
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
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td class="text-center">{{ $users->firstItem() + $key }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->roles->first()->name }}</td>
                                                <td>
                                                    <div class="text-center">
                                                        <form action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                                                class="text-primary p-2"><i class="fa fa-edit"></i></a>
                                                            <a href="{{ route('users.destroy', ['user' => $user->id]) }}"
                                                                onclick="event.preventDefault(); this.closest('form').submit();"
                                                                class="text-danger p-2"><i class="fa fa-trash"></i> </a>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-2">
                                {{ $users->links('pagination::bootstrap-5') }}
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
