@extends('cms.layouts.app')

@section('title', 'Navigation Menu List')

@push('css')
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.4/dist/sweetalert2.min.css">

    <style>
        /* ====== CARD LOOK ====== */
        ul.sortable {
            list-style: none;
            padding-left: 0
        }

        .sortable>li {
            background: #fff;
            border: 1px solid #e0e0e0;
            border-left: 4px solid #0d6efd;
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .05);
            transition: background .2s
        }

        .sortable>li:hover {
            background: #f5f9ff
        }

        .menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .menu-title {
            font-weight: 600;
            font-size: 16px
        }

        .handle {
            cursor: grab;
            opacity: .5;
            font-size: 17px;
            margin-right: 6px
        }

        .sortable ul {
            margin-top: 12px;
            padding-left: 25px;
            border-left: 2px dashed #dee2e6
        }

        .sortable ul li {
            background: #f8f9fa;
            border: 1px dashed #ced4da;
            border-left: 4px solid #20c997;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 10px
        }

        .sortable ul li:hover {
            background: #edf4ff
        }

        /* ====== COLLAPSE BTN ====== */
        .toggle-submenu {
            width: 32px;
            height: 32px;
            padding: 0;
            font-size: 14px
        }

        .toggle-submenu::after {
            content: '▼'
        }

        .toggle-submenu.collapsed::after {
            content: '▶'
        }

        /* ====== PLACEHOLDER ====== */
        .ui-sortable-placeholder {
            height: 45px !important;
            background: #d0ebff !important;
            border: 2px dashed #74c0fc;
            border-radius: 8px !important
        }

        .btn-icon {
            padding: 4px 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endpush


@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Navigation Menu</h1>
            </div>
            <div class="col-8">
                <ul class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item"><a href="#">CMS</a></li>
                    <li class="breadcrumb-item active">Menus</li>
                </ul>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <div class="theme-body common-dash" data-simplebar>
        <div class="custom-container">
            <div class="container my-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3><i data-feather="list" class="me-1"></i> Navigation Menu List</h3>
                    @can('Menu Create')
                        <a href="{{ route('menus.create') }}" class="btn btn-primary">
                            <i data-feather="plus" class="me-1"></i> Add Menu
                        </a>
                    @endcan
                </div>

                {{-- Flash success --}}
                @if (session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', () =>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: '{{ session('success') }}',
                                showConfirmButton: false,
                                timer: 2000
                            }));
                    </script>
                @endif

                {{-- TREE (unlimited depth) --}}
                <ul class="sortable menu-tree">
                    @foreach ($menus as $menu)
                        @include('cms.menus.menu-item', ['menu' => $menu])
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <!-- SweetAlert2 & jQuery UI -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <script>
        /* ====== SERIALIZER (rekursif) ====== */
        function walk($items, parentId = null) {
            let rows = [];
            $items.each(function(idx, el) {
                const $el = $(el);
                const id = $el.data('id');
                rows.push({
                    id,
                    parent_id: parentId,
                    sort_order: idx
                });

                const $kids = $el.children('ul.sortable').children('li');
                if ($kids.length) rows = rows.concat(walk($kids, id));
            });
            return rows;
        }

        /* ====== INIT SORTABLE ====== */
        function mountSortables() {
            $('ul.sortable').sortable({
                connectWith: '.sortable',
                handle: '.handle',
                placeholder: 'ui-state-highlight',
                start: (e, ui) => ui.placeholder.height(ui.helper.outerHeight()),
                update: () => {
                    const data = walk($('.menu-tree > li'));
                    $.post({
                        url: '{{ route('menus.order') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            menu: data
                        },
                        success: res => Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message,
                            showConfirmButton: false,
                            timer: 1500
                        }),
                        error: () => Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to update menu order!',
                            confirmButtonColor: '#d33'
                        })
                    });
                }
            }).disableSelection();
        }

        /* ====== DELETE CONFIRM ====== */
        function mountDelete() {
            document.querySelectorAll('.delete-form').forEach(f => {
                f.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const title = this.dataset.title || 'this item';
                    Swal.fire({
                        title: 'Are you sure?',
                        html: `You are about to delete <strong>"${title}"</strong>.`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#6c757d',
                        confirmButtonText: 'Yes, delete it!',
                        reverseButtons: true
                    }).then(r => r.isConfirmed && this.submit());
                });
            });
        }

        /* ====== COLLAPSE ICON ROTATE ====== */
        $(document).on('click', '.toggle-submenu', function() {
            $(this).toggleClass('collapsed');
        });

        /* ====== MOUNT ====== */
        $(document).ready(function() {
            mountSortables();
            mountDelete();
        });
    </script>
@endpush
