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
                        <button class="btn btn-primary" type="submit">Publish</button>
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
                                    <label class="form-label">Name Website</label>
                                    <input class="form-control @error('web_name') is-invalid @enderror" name="web_name"
                                        type="text" placeholder="Name Website" value="{{ $config->web_name }}">
                                    @error('web_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name PT</label>
                                    <input class="form-control @error('nama_pt') is-invalid @enderror" name="nama_pt"
                                        type="text" placeholder="Nama PT" value="{{ $config->nama_pt }}">
                                    @error('nama_pt')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Favicon</label>
                                    <input class="form-control @error('favicon') is-invalid @enderror" name="favicon"
                                        type="text" placeholder="favicon" value="{{ $config->favicon }}">
                                    @error('favicon')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Logo Website</label>
                                    <input class="form-control @error('logo') is-invalid @enderror" name="logo"
                                        type="text" placeholder="logo" value="{{ $config->logo }}">
                                    @error('logo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control @error('meta_description') is-invalid @enderror" name="meta_description"
                                        placeholder="Enter Meta Description">{{ $config->meta_description }}</textarea>
                                    @error('meta_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Facebook</label>
                                    <input class="form-control @error('facebook') is-invalid @enderror" name="facebook"
                                        type="text" placeholder="facebook" value="{{ $config->facebook }}">
                                    @error('facebook')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Instagram</label>
                                    <input class="form-control @error('instagram') is-invalid @enderror" name="instagram"
                                        type="text" placeholder="instagram" value="{{ $config->instagram }}">
                                    @error('instagram')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Twitter</label>
                                    <input class="form-control @error('twitter') is-invalid @enderror" name="twitter"
                                        type="text" placeholder="twitter" value="{{ $config->twitter }}">
                                    @error('twitter')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Whatsapp</label>
                                    <input class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp"
                                        type="text" placeholder="whatsapp" value="{{ $config->whatsapp }}">
                                    @error('whatsapp')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Telegram</label>
                                    <input class="form-control @error('telegram') is-invalid @enderror" name="telegram"
                                        type="text" placeholder="telegram" value="{{ $config->telegram }}">
                                    @error('telegram')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Alamat</label>
                                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        placeholder="Enter Alamat">{{ $config->alamat }}</textarea>
                                    @error('alamat')
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
