@extends('cms.layouts.app')

@section('title')
    Edit User
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Edit User</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users List</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="{{ route('users.create') }}">Edit User</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xl-12 col-md-7 cdx-xl-60">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit User</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                        type="text" placeholder="Name" value="{{ $user->name }}" readonly>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" name="username"
                                        type="text" placeholder="Username" value="{{ old('username', $user->username) }}">
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <select class="form-control hidesearch @error('role') is-invalid @enderror" name="role">
                                        <option selected disabled>--- Select Role ---</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ (old('role', $user->roles->first()?->id) == $role->id) ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                                        type="email" placeholder="Email" value="{{ old('email', $user->email) }}" readonly>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="group-btn">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
@endpush
