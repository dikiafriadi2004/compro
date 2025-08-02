@extends('cms.layouts.app')

@section('title')
    Edit Profile
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Edit Profile</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a class="text-light" href="{{ route('users.create') }}">Edit Profile</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xl-12 col-md-7 cdx-xl-60">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                {{-- Name --}}
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                        type="text" placeholder="Name" value="{{ old('name', auth()->user()->name) }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Username --}}
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" name="username"
                                        type="text" placeholder="Username"
                                        value="{{ old('username', auth()->user()->username) }}">
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Role --}}
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <input class="form-control" type="text"
                                        value="{{ auth()->user()->getRoleNames()->first() ?? '-' }}" readonly>
                                </div>

                                {{-- Email --}}
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                                        type="email" placeholder="Email"
                                        value="{{ old('email', auth()->user()->email) }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" name="password"
                                        type="password" placeholder="Leave blank if not changing">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Password Confirmation --}}
                                <div class="form-group">
                                    <label class="form-label">Password Confirmation</label>
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" type="password" placeholder="Confirm Password">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Submit --}}
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
    {{-- Alert Success --}}
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

    {{-- Alert Error --}}
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
@endpush
