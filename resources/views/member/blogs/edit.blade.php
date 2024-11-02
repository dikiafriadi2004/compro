@extends('layouts.app')

@section('title')
    Edit Blog
@endsection

@push('css')
@endpush

@section('content')
    <div class="content">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Edit Post
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                    <button type="button" type="submit" class="btn btn-primary shadow-md flex items-center"> <i class="w-4 h-4 mr-2"
                            data-lucide="check-square"></i> Save </button>
                </div>
            </div>
            <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
                <!-- BEGIN: Post Content -->
                <div class="intro-y col-span-12 lg:col-span-8">
                    <input type="text" class="intro-y form-control py-3 px-4 box pr-10" placeholder="Title">
                    <div class="post intro-y overflow-hidden box mt-5">
                        <div class="post__content tab-content">
                            <div id="content" class="tab-pane p-5 active" role="tabpanel" aria-labelledby="content-tab">
                                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div
                                        class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                        <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Description
                                    </div>
                                    <div class="mt-5">
                                        <textarea id="message" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Write your description here..."></textarea>
                                    </div>
                                </div>
                                <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                                    <div
                                        class="font-medium flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                                        <i data-lucide="chevron-down" class="w-4 h-4 mr-2"></i> Content
                                    </div>
                                    <div class="mt-5">
                                        <div class="editor">
                                            <p>Content of the editor.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Post Content -->
                <!-- BEGIN: Post Info -->
                <div class="col-span-12 lg:col-span-4">
                    <div class="intro-y box p-5">
                        <div class="mt-3">
                            <label for="post-form-3" class="form-label">Categories</label>
                            <select data-placeholder="Select categories" class="tom-select w-full" id="post-form-3" multiple>
                                <option value="1" selected>Horror</option>
                                <option value="2">Sci-fi</option>
                                <option value="3" selected>Action</option>
                                <option value="4">Drama</option>
                                <option value="5">Comedy</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="post-form-4" class="form-label">Tags</label>
                            <select data-placeholder="Select your favorite actors" class="tom-select w-full" id="post-form-4"
                                multiple>
                                <option value="1" selected>Leonardo DiCaprio</option>
                                <option value="2">Johnny Deep</option>
                                <option value="3" selected>Robert Downey, Jr</option>
                                <option value="4">Samuel L. Jackson</option>
                                <option value="5">Morgan Freeman</option>
                            </select>
                        </div>
                        <div class="form-check form-switch flex flex-col items-start mt-3">
                            <label for="post-form-5" class="form-check-label ml-0 mb-2">Published</label>
                            <input id="post-form-5" class="form-check-input" type="checkbox">
                        </div>
                        <div class="form-check form-switch flex flex-col items-start mt-3">
                            <label for="post-form-6" class="form-check-label ml-0 mb-2">Show Author Name</label>
                            <input id="post-form-6" class="form-check-input" type="checkbox">
                        </div>
                    </div>
                </div>
                <!-- END: Post Info -->
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script src="{{ asset('dist/js/ckeditor-classic.js') }}"></script>
@endpush
