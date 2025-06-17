@extends('cms.layouts.app')

@section('title', 'Create Menu')

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Create Menu</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="#">Menu</a></li>
                    <li class="breadcrumb-item active">Create Menu</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <div class="col-xl-12 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="container my-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4>➕ Tambah Menu</h4>
                                <a href="{{ route('menus.index') }}" class="btn btn-secondary">← Kembali</a>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Terjadi kesalahan:</strong>
                                    <ul class="mb-0 mt-1">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('menus.store') }}" method="POST">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Judul Menu</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="type" class="form-label">Tipe Menu</label>
                                    <select name="type" class="form-select" required id="typeSelect">
                                        <option value="" disabled {{ old('type') ? '' : 'selected' }}>-- Pilih Tipe --
                                        </option>
                                        <option value="home" {{ old('type') == 'home' ? 'selected' : '' }}>Home</option>
                                        <option value="blog" {{ old('type') == 'blog' ? 'selected' : '' }}>Blog</option>
                                        <option value="page" {{ old('type') == 'page' ? 'selected' : '' }}>Page</option>
                                        <option value="custom" {{ old('type') == 'custom' ? 'selected' : '' }}>Custom URL
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3" id="customUrlInput" style="display: none;">
                                    <label for="url" class="form-label">Custom URL</label>
                                    <input type="text" name="url" class="form-control" placeholder="https://..."
                                        value="{{ old('url') }}">
                                </div>

                                <div class="mb-3" id="pageSelectInput" style="display: none;">
                                    <label for="page_id" class="form-label">Pilih Halaman</label>
                                    @isset($pages)
                                        @if ($pages->count())
                                            <select name="page_id" class="form-select">
                                                @foreach ($pages as $page)
                                                    <option value="{{ $page->id }}"
                                                        {{ old('page_id') == $page->id ? 'selected' : '' }}>
                                                        {{ $page->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        @else
                                            <div class="alert alert-warning mb-0">
                                                Belum ada halaman. <a href="{{ route('pages.create') }}">Buat halaman baru</a>.
                                            </div>
                                        @endif
                                    @else
                                        <div class="alert alert-danger">Data halaman tidak tersedia. Pastikan controller
                                            mengirim data
                                            <code>$pages</code>.
                                        </div>
                                    @endisset
                                </div>

                                <div class="mb-3">
                                    <label for="parent_id" class="form-label">Parent Menu (Opsional)</label>
                                    <select name="parent_id" class="form-select">
                                        <option value="">-- Tanpa Parent --</option>
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->id }}"
                                                {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                                {{ $parent->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="order" class="form-label">Urutan</label>
                                    <input type="number" name="order" class="form-control"
                                        value="{{ old('order', 0) }}">
                                </div>

                                <button class="btn btn-primary">💾 Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('typeSelect');
            const customUrlInput = document.getElementById('customUrlInput');
            const pageSelectInput = document.getElementById('pageSelectInput');

            function toggleInputs() {
                const selected = typeSelect.value;
                customUrlInput.style.display = selected === 'custom' ? 'block' : 'none';
                pageSelectInput.style.display = selected === 'page' ? 'block' : 'none';
            }

            typeSelect.addEventListener('change', toggleInputs);
            toggleInputs(); // Load saat pertama kali
        });
    </script>
@endpush
