@extends('cms.layouts.app')

@section('title')
    Config Website
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Config Website</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Config</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="{{ route('post.index') }}">Config Website</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <form action="{{ route('config.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <div class="group-btn">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-md-7 cdx-xl-60">
                        <div class="card">
                            <div class="card-header">
                                <h4>Config Website</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Measurement ID</label>
                                    <input class="form-control @error('measurement_id') is-invalid @enderror" name="measurement_id"
                                        type="text" placeholder="G-XXXXXXX" value="{{ $config->measurement_id }}">
                                    @error('measurement_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Property ID</label>
                                    <input class="form-control @error('property_id') is-invalid @enderror" name="property_id"
                                        type="text" placeholder="123456789" value="{{ $config->property_id }}">
                                    @error('property_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label class="form-label">Upload Credential JSON (Opsional)</label>
                                    <input class="form-control @error('credentials') is-invalid @enderror" name="credentials"
                                        type="file" onchange="readURL(this);" value="{{ $config->credentials }}">
                                    @error('credentials')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                title: 'Error!',
                text: "{{ session('error') }}",
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    @endif
@endpush
