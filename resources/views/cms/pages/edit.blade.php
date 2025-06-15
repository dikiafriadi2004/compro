@extends('cms.layouts.app')

@section('title', 'Edit Page')

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
                <h1 class="fs-5">Edit Page</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="#">Page</a></li>
                    <li class="breadcrumb-item active">Edit Page</li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <form action="{{ route('pages.update', ['page' => $page->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <div class="group-btn">
                        <button class="btn btn-primary" type="submit">Publish</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Page</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <input class="form-control @error('title') is-invalid @enderror" id="title"
                                        name="title" type="text" placeholder="Title"
                                        value="{{ old('title', $page->title) }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Slug</label>
                                    <input class="form-control @error('slug') is-invalid @enderror" id="slug"
                                        name="slug" type="text" placeholder="Slug"
                                        value="{{ old('slug', $page->slug) }}">
                                    @error('slug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Content</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="editor"
                                        placeholder="Enter Content">{!! old('content', $page->content) !!}</textarea>
                                    @error('content')
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
    </script>
@endpush
