@extends('cms.layouts.app')

@section('title')
    Create User
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Create User</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Config</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="{{ route('post.index') }}">Create User</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-md-7 cdx-xl-60">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create User</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                        type="text" placeholder="Name" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" name="username"
                                        type="text" placeholder="Username" value="{{ old('username') }}">
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                @php
                                    $oldRoleId = is_object(old('role')) ? old('role')->id : old('role');
                                @endphp

                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <select class="form-control hidesearch @error('role') is-invalid @enderror"
                                        name="role">
                                        <option selected disabled>--- Select Role ---</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                {{ $oldRoleId == $role->id ? 'selected' : '' }}>
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
                                        type="email" placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input class="form-control @error('email') is-invalid @enderror" name="password"
                                        type="password" placeholder="Password">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password Confirmation</label>
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" type="password" placeholder="Password Confirmation">
                                    @error('password_confirmation')
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
