@extends('cms.layouts.app')

@section('title', 'Edit Menu')

@section('content')
<div class="container py-4">
    <h3>✏️ Edit Menu</h3>

    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $menu->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipe</label>
            <select name="type" class="form-select" onchange="handleTypeChange(this)">
                <option value="custom" {{ $menu->type == 'custom' ? 'selected' : '' }}>Custom</option>
                <option value="home" {{ $menu->type == 'home' ? 'selected' : '' }}>Home</option>
                <option value="blog" {{ $menu->type == 'blog' ? 'selected' : '' }}>Blog</option>
                <option value="page" {{ $menu->type == 'page' ? 'selected' : '' }}>Page</option>
            </select>
        </div>

        <div class="mb-3" id="url_input" style="{{ $menu->type == 'custom' ? '' : 'display:none;' }}">
            <label for="url" class="form-label">URL</label>
            <input type="text" class="form-control" name="url" value="{{ old('url', $menu->url) }}">
        </div>

        <div class="mb-3" id="page_select" style="{{ $menu->type == 'page' ? '' : 'display:none;' }}">
            <label for="page_id" class="form-label">Halaman</label>
            <select name="page_id" class="form-select">
                <option value="">-- Pilih Halaman --</option>
                @foreach ($pages as $page)
                    <option value="{{ $page->id }}" {{ $menu->page_id == $page->id ? 'selected' : '' }}>{{ $page->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Menu</label>
            <select name="parent_id" class="form-select">
                <option value="">-- Tidak Ada --</option>
                @foreach ($parents as $parent)
                    <option value="{{ $parent->id }}" {{ $menu->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="text-end">
            <button class="btn btn-primary">💾 Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection

@push('js')
<script>
    function handleTypeChange(select) {
        const value = select.value;
        document.getElementById('page_select').style.display = value === 'page' ? 'block' : 'none';
        document.getElementById('url_input').style.display = value === 'custom' ? 'block' : 'none';
    }
</script>
@endpush
