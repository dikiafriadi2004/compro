@extends('cms.layouts.app')

@section('title', 'Daftar Menu Navigasi')

@push('css')
    <style>
        li {
            list-style: none;
        }

        .sortable li {
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 5px;
            background: #f8f9fa;
            border-radius: 6px;
        }

        .sortable li .btn {
            margin-left: 4px;
        }

        .sortable {
            padding-left: 0;
        }

        .sortable li ul {
            margin-top: 10px;
            padding-left: 20px;
        }
    </style>
@endpush

@section('breadcrumb')
    <div class="codex-breadcrumb">
        <div class="row">
            <div class="col-4">
                <h1 class="fs-5">Menu Navigasi</h1>
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
                    <h3>📋 Daftar Menu Navigasi</h3>
                    <a href="{{ route('menus.create') }}" class="btn btn-primary">➕ Tambah Menu</a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Tampilan menu dalam bentuk nested list --}}
                <ul class="sortable list-group">
                    @foreach ($menus as $menu)
                        <li class="list-group-item" data-id="{{ $menu->id }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>{{ $menu->title }}</strong>
                                <div>
                                    <a href="{{ route('menus.edit', $menu) }}" class="btn btn-sm btn-warning">✏️</a>
                                    <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">🗑️</button>
                                    </form>
                                </div>
                            </div>

                            {{-- Nested Child --}}
                            @if ($menu->children->count())
                                <ul class="sortable list-group mt-2 ms-4">
                                    @foreach ($menu->children as $child)
                                        <li class="list-group-item" data-id="{{ $child->id }}">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>{{ $child->title }}</span>
                                                <div>
                                                    <a href="{{ route('menus.edit', $child) }}"
                                                        class="btn btn-sm btn-warning">✏️</a>
                                                    <form action="{{ route('menus.destroy', $child) }}" method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Yakin ingin menghapus submenu ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">🗑️</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script>
        $('.sortable').sortable({
            connectWith: '.sortable',
            placeholder: 'ui-state-highlight',
            update: function(event, ui) {
                let data = [];

                $('.sortable > li').each(function(index, el) {
                    const id = $(el).data('id');
                    const parentId = $(el).closest('ul').closest('li').data('id') || null;

                    data.push({
                        id: id,
                        parent_id: parentId,
                        sort_order: index
                    });

                    // Anak-anak submenu
                    $(el).find('> ul > li').each(function(i, subEl) {
                        data.push({
                            id: $(subEl).data('id'),
                            parent_id: id,
                            sort_order: i
                        });
                    });
                });

                $.ajax({
                    url: '{{ route('menus.order') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        menu: data
                    },
                    success: function(res) {
                        alert(res.message);
                        console.log('✅ Menu updated');
                    },
                    error: function(err) {
                        console.error(err);
                        alert('❌ Gagal memperbarui urutan menu!');
                    }
                });
            }
        }).disableSelection();
    </script>
@endpush
