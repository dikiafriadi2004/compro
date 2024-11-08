@extends('layouts.app')

@section('title')
    Blog
@endsection

@push('css')
@endpush

@section('content')
    <div class="content">
        <h2 class="intro-y text-lg font-medium mt-10">
            Blog List
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <button class="btn btn-primary shadow-md mr-2">Add New</button>
                {{-- <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div> --}}
                {{-- <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
                </div>
            </div> --}}
            </div>
            <!-- BEGIN: Data List -->
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">Title</th>
                            <th class="whitespace-nowrap">Date</th>
                            <th class="whitespace-nowrap">Status</th>
                            <th class="text-center whitespace-nowrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="font-medium text-slate-500 whitespace-nowrap">{{ $loop->iteration }}</div>
                                </td>
                                <td>
                                    <div class="font-medium text-slate-500 whitespace-nowrap mt-0.5">{{ $item->title }}
                                    </div>
                                </td>
                                <td>
                                    <div class="font-medium text-slate-500 whitespace-nowrap mt-0.5">
                                        {{ $item->created_at->isoFormat('dddd, D MMMM Y') }}</div>
                                </td>
                                <td class="w-40">
                                    @if ($item->status == 'publish')
                                        <div class="flex items-center text-success"> <i
                                                data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $item->status }}
                                        </div>
                                    @else
                                        <div class="flex items-center text-danger"> <i
                                                data-lucide="check-square" class="w-4 h-4 mr-2"></i> {{ $item->status }}
                                        </div>
                                    @endif
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center text-primary mr-3" href="javascript:;"> <i data-lucide="eye"
                                            class="w-4 h-4 mr-1"></i> Detail </a>
                                        <a class="flex items-center mr-3" href="{{ route("member.blogs.edit", ["blog"=>$item->id]) }}"> <i data-lucide="check-square"
                                                class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal"
                                            data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2"
                                                class="w-4 h-4 mr-1"></i> Delete </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END: Data List -->
            <!-- BEGIN: Pagination -->
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                {{ $data->links() }}
            </div>
            <!-- END: Pagination -->
        </div>
        <!-- BEGIN: Delete Confirmation Modal -->
        <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="p-5 text-center">
                            <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">Are you sure?</div>
                            <div class="text-slate-500 mt-2">
                                Do you really want to delete these records?
                                <br>
                                This process cannot be undone.
                            </div>
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                            <button type="button" class="btn btn-danger w-24">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Delete Confirmation Modal -->
    </div>
@endsection

@push('js')
@endpush
