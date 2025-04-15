@extends('cms.layouts.app')

@section('title')
    Create Post
@endsection

@push('css')
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Create Post</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Post</a></li>
                    <li class="breadcrumb-item"><a class="text-light" href="#!">Create Post</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="theme-body">
        <div class="custom-container codexedit-profile">
            <form action="{{ route('post.update', ['post' => $data->id]) }}" method="POST" enctype="multipart/form-data">
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
                                <h4>Create Post</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Title</label>
                                    <input class="form-control @error('title') is-invalid @enderror" name="title" type="text"
                                        placeholder="Title" value="{{ old('title', $data->title) }}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Enter Description">{{ old('description', $data->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Content</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" placeholder="Enter Content">{!! old('content', $data->content) !!}</textarea>
                                    @error('content')
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
                                        <select class="form-control hidesearch @error('status') is-invalid @enderror" name="status">
                                            <option value="" hidden>Pilih</option>
                                            <option value="publish" {{ (old('status', $data->status) == 'publish') ? 'selected' : '' }}>Publish</option>
                                            <option value="draft" {{ (old('status', $data->status) == 'draft') ? 'selected' : '' }}>Draft</option>
                                        </select>
                                        @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label">Categories</label>
                                        <select class="form-control hidesearch" name="category">
                                            <option>Berita</option>
                                            <option>Promo</option>
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
                                                @isset($data->thumbnail)
                                                    <img id="thumbnail-preview" src="{{ asset(getenv('CUSTOM_THUMBNAIL_LOCATION').'/'.$data->thumbnail) }}" alt=""
                                                        class="img-fluid mt-3" />
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
    </script>
@endpush
