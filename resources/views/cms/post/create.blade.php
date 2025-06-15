@extends('cms.layouts.app')

@section('title', 'Create Post')

@push('css')
    <style>
        .ck-editor__editable {
            min-height: 300px;
        }

        .ck-content ul {
            list-style-type: disc !important;
            padding-left: 2rem !important;
        }

        .ck-content ol {
            list-style-type: decimal !important;
            padding-left: 2rem !important;
        }

        .ck-content blockquote {
            border-left: 4px solid #ccc !important;
            padding-left: 1rem !important;
            margin: 1rem 0 !important;
            color: #666 !important;
            font-style: italic;
        }
    </style>
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Create Post</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="#">Post</a></li>
                    <li class="breadcrumb-item active">Create Post</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <div class="group-btn">
                        <button class="btn btn-primary" type="submit">Publish</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-8 col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h4>Create Post</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                                        class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                                        class="form-control @error('slug') is-invalid @enderror" placeholder="Slug">
                                    @error('slug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror"
                                        placeholder="Enter Description" maxlength="145">{{ old('meta_description') }}</textarea>
                                    @error('meta_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Content</label>
                                    <textarea name="content" id="editor" class="form-control @error('content') is-invalid @enderror"
                                        placeholder="Enter Content">{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <input type="text" name="meta_keyword" value="{{ old('meta_keyword') }}"
                                        class="form-control @error('meta_keyword') is-invalid @enderror"
                                        placeholder="Meta Keyword">
                                    @error('meta_keyword')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-2">
                                    <label>Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="" hidden>-- Pilih --</option>
                                        <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish
                                        </option>
                                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-2">
                                    <label>Categories</label>
                                    <select name="category_id"
                                        class="form-control @error('category_id') is-invalid @enderror">
                                        <option selected disabled>--- Select Category ---</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-2">
                                    <label>Thumbnail</label>
                                    <input type="file" name="thumbnail"
                                        class="form-control @error('thumbnail') is-invalid @enderror"
                                        onchange="readURL(this);">
                                    @error('thumbnail')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="text-center">
                                        <img id="thumbnail-preview" src="#" alt="Preview"
                                            class="img-fluid mt-3 d-none" />
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
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
    <script>
        // CKEditor Init
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('post.upload') }}?_token={{ csrf_token() }}'
                },
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', '|',
                    'blockQuote', '|',
                    'link', 'bulletedList', 'numberedList', '|',
                    'insertTable', 'imageUpload', '|',
                    'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });

        // Slug Generator
        function createSlug(text) {
            return text.toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }

        $(document).ready(function() {
            $('#title').on('input', function() {
                const title = $(this).val();
                const slug = createSlug(title);
                $('#slug').val(slug);
            });
        });

        // Thumbnail Preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#thumbnail-preview').attr('src', e.target.result).removeClass('d-none');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
