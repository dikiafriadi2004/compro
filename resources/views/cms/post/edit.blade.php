@extends('cms.layouts.app')

@section('title')
    Edit Post
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Edit Post</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Post</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="#!">Edit Post</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <div class="group-btn">
                        <button class="btn btn-primary" type="submit">Publish</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-md-7 cdx-xl-60">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Post</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <input class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                                        type="text" placeholder="Title" value="{{ old('title', $post->title) }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Slug</label>
                                    <input class="form-control @error('slug') is-invalid @enderror" id="slug"
                                        name="slug" type="text" placeholder="Slug"
                                        value="{{ old('slug', $post->slug) }}">
                                    @error('slug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description"
                                        placeholder="Enter Description" maxlength="145">{{ old('meta_description', $post->meta_description) }}</textarea>
                                    @error('meta_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Content</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Enter Content">{!! old('content', $post->content) !!}</textarea>
                                    @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Meta Keyword</label>
                                    <input class="form-control @error('meta_keyword') is-invalid @enderror"
                                        name="meta_keyword" type="text" placeholder="Meta Keyword"
                                        value="{{ old('meta_keyword', $post->meta_keyword) }}">
                                    @error('meta_keyword')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-5 cdx-xl-40">
                        <div class="card">
                            <div class="card-body">

                                <div class="info-group">
                                    <div class="mb-2">
                                        <label class="form-label">Status</label>
                                        <select class="form-control hidesearch @error('status') is-invalid @enderror"
                                            name="status">
                                            <option value="" hidden>Pilih</option>
                                            <option value="publish"
                                                {{ old('status', $post->status) == 'publish' ? 'selected' : '' }}>Publish
                                            </option>
                                            <option value="draft"
                                                {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Categories</label>
                                        <select class="form-control hidesearch" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="info-group">
                                    <div class="mb-2">
                                        <div class="form-group">
                                            <label class="form-label">Thumbnail</label>
                                            <input type="file"
                                                class="form-control @error('thumbnail') is-invalid @enderror"
                                                name="thumbnail" onchange="readURL(this);">
                                            @error('thumbnail')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="text-center">
                                                @isset($post->thumbnail)
                                                    <img id="thumbnail-preview"
                                                        src="{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION') . '/' . $post->thumbnail) }}"
                                                        alt="" class="img-fluid mt-3" />
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
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
    <script type="text/javascript">
        // Preview Thumbnail
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#thumbnail-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        // Generate Slug
        function createSlug(text) {
            return text.toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '') // Hapus karakter non-alfanumerik
                .replace(/\s+/g, '-') // Ganti spasi dengan strip
                .replace(/-+/g, '-'); // Hindari multiple strip
        }

        $(document).ready(function() {
            $('#title').on('input', function() {
                const title = $(this).val();
                const slug = createSlug(title);
                $('#slug').val(slug);
            });
        });
    </script>
@endpush
