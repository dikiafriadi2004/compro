@extends('layouts.app')

@section('title')
    Add Articles
@endsection

@section('breadcrumb')
    <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
        <div class="grow">
            <h5 class="text-16">Articles</h5>
        </div>
        <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
            <li
                class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                <a href="{{ route('article.index') }}" class="text-slate-400 dark:text-zink-200">Articles</a>
            </li>
            <li class="text-slate-700 dark:text-zink-100">
                Add Article
            </li>
        </ul>
    </div>
@endsection

@push('css')
@endpush

@section('content')
    <form action="">
        <div class="flex justify-end gap-2 mt-2 mb-2">
            <button
                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                    class="align-baseline ltr:pr-1 rtl:pl-1 ri-save-line"></i> Save</button>
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-x-5">
            <div class="xl:col-span-9">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-4 text-15">Create Article</h6>

                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-12">
                            <div class="xl:col-span-12">
                                <label for="title" class="inline-block mb-2 text-base font-medium">Title</label>
                                <input type="text" id="title"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Title" required>
                            </div><!--end col-->
                            <div class="xl:col-span-12">
                                <label for="productCodeInput" class="inline-block mb-2 text-base font-medium">Slug</label>
                                <input type="text" id="productCodeInput"
                                    class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                    placeholder="Product Code" value="TWT145015" disabled required>
                                <p class="mt-1 text-sm text-slate-400 dark:text-zink-200">Slug will be generated
                                    automatically</p>
                            </div><!--end col-->

                            <div class="lg:col-span-2 xl:col-span-12">
                                <div>
                                    <label for="productDescription"
                                        class="inline-block mb-2 text-base font-medium">Description</label>
                                    <textarea
                                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                        id="productDescription" placeholder="Enter Description" rows="5"></textarea>
                                </div>
                            </div>
                        </div><!--end grid-->
                    </div>
                </div><!--end card-->
            </div><!--end col-->
            <div class="xl:col-span-3">
                <div class="card sticky top-[calc(theme('spacing.header')_*_1.3)]">
                    <div class="card-body">
                        {{-- <h6 class="mb-4 text-15">Product Card Preview</h6> --}}

                        <div class="xl:col-span-4 mb-2">
                            <label for="productStatus" class="inline-block mb-2 text-base font-medium">Status</label>
                            <select
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                data-choices data-choices-search-false name="productStatus" id="productStatus">
                                <option value="Draft">Draft</option>
                                <option value="Published">Published</option>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Entertainment">Entertainment</option>
                            </select>
                        </div><!--end col-->

                        <div class="xl:col-span-4 mb-2">
                            <label for="categorySelect" class="inline-block mb-2 text-base font-medium">Category</label>
                            <select
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                data-choices data-choices-search-false name="categorySelect" id="categorySelect">
                                <option value="">Select Category</option>
                                <option value="Mobiles, Computers">Mobiles, Computers</option>
                                <option value="TV, Appliances, Electronics">TV, Appliances, Electronics</option>
                                <option value="Men's Fashion">Men's Fashion</option>
                                <option value="Women's Fashion">Women's Fashion</option>
                                <option value="Home, Kitchen, Pets">Home, Kitchen, Pets</option>
                                <option value="Beauty, Health, Grocery">Beauty, Health, Grocery</option>
                                <option value="Books">Books</option>
                            </select>
                        </div><!--end col-->

                        <div class="xl:col-span-4">
                            <label for="productTag" class="inline-block mb-2 text-base font-medium">Tag</label>
                            <input
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                id="productTag" data-choices data-choices-text-unique-true type="text">
                        </div><!--end col-->
                    </div>
                </div><!--end card-->
                <div class="card sticky top-[calc(theme('spacing.header')_*_1.3)]">
                    <div class="card-body">
                        {{-- <h6 class="mb-4 text-15">Product Card Preview</h6> --}}

                        <div class="xl:col-span-4 mb-2">
                            <label for="thumbnail" class="inline-block mb-2 text-base font-medium">Thumbnail</label>
                            <input type="file" id="thumbnail"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200" required>
                        </div><!--end col-->
                    </div>
                </div><!--end card-->
            </div><!--end col-->
        </div>
    </form>
@endsection


@push('js')
@endpush
