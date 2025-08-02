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
                    <li class="breadcrumb-item"><a class="text-light" href="{{ route('profile.edit') }}">Edit Profile</a></li>
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
                                    <label class="form-label">Nama</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                        type="text" placeholder="Name" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Username --}}
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" name="username"
                                        type="text" placeholder="Username"
                                        value="{{ old('username', $user->username) }}">
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Role --}}
                                <div class="form-group">
                                    <label class="form-label">Role</label>
                                    <input class="form-control" type="text"
                                        value="{{ $user->getRoleNames()->first() ?? '-' }}" readonly>
                                </div>

                                {{-- Email --}}
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" name="email"
                                        type="email" placeholder="Email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Photo Profile --}}
                                <div class="form-group">
                                    <label class="form-label">Foto Profil</label>
                                    <input type="file" class="form-control @error('profile_photo') is-invalid @enderror"
                                        name="profile_photo" onchange="readURL(this);">
                                    @error('profile_photo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="mt-2">
                                        @if ($user->profile_photo)
                                            <img id="profile_photo-preview"
                                                src="{{ asset(env('CUSTOM_UPLOAD_PROFILE_LOCATION', 'uploads/profile-photos') . '/' . $user->profile_photo) }}"
                                                alt="Preview Foto" class="img-fluid rounded shadow mt-2"
                                                style="max-height: 150px;">
                                        @else
                                            <img id="profile_photo-preview" src="#" alt="Preview Foto"
                                                class="img-fluid rounded shadow mt-2 d-none" style="max-height: 150px;">
                                        @endif
                                    </div>
                                </div>

                                {{-- Password --}}
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input class="form-control @error('password') is-invalid @enderror" name="password"
                                        type="password" placeholder="Biarkan kosong jika tidak ingin mengubah">
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Password Confirmation --}}
                                <div class="form-group">
                                    <label class="form-label">Konfirmasi Password</label>
                                    <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                        name="password_confirmation" type="password" placeholder="Konfirmasi Password">
                                    @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Submit --}}
                                <div class="group-btn">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
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
                title: 'Berhasil!',
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
                title: 'Gagal!',
                text: "{{ session('error') }}",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif

    {{-- Preview Foto --}}
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('profile_photo-preview');
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
