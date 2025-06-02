@extends('cms.layouts.app')

@section('title')
    Landing Page
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Landing Page</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Landing Page</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="{{ route('landing.edit') }}">Landing Page</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <form action="{{ route('landing.update') }}" method="POST" enctype="multipart/form-data">
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
                                <h4>Landing Page</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <input class="form-control @error('title') is-invalid @enderror" name="title"
                                        type="text" placeholder="Title" value="{{ $landing->title }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                        placeholder="Enter Description">{{ $landing->description }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">CTA</label>
                                    <input class="form-control @error('cta') is-invalid @enderror" name="cta"
                                        type="text" placeholder="CTA" value="{{ $landing->cta }}">
                                    @error('cta')
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
