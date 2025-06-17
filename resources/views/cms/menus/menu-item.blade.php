<li data-id="{{ $menu->id }}">
    <div class="menu-header">
        <div class="d-flex align-items-center gap-2">
            @if ($menu->children->count())
                <button class="btn btn-sm btn-outline-secondary toggle-submenu" data-bs-toggle="collapse"
                    data-bs-target="#submenu-{{ $menu->id }}"></button>
            @else
                <span style="width:32px"></span>
            @endif

            <span class="handle">☰</span>
            <span class="menu-title">{{ $menu->title }}</span>
        </div>

        <div>
            @can('Menu Edit')
                <a href="{{ route('menus.edit', $menu) }}" class="btn btn-sm btn-outline-primary me-1">✏️</a>
            @endcan

            @can('Menu Delete')
                <form method="POST" action="{{ route('menus.destroy', $menu) }}" class="d-inline delete-form"
                    data-title="{{ $menu->title }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">🗑️</button>
                </form>
            @endcan

        </div>
    </div>

    @if ($menu->children->count())
        <ul id="submenu-{{ $menu->id }}" class="sortable collapse show mt-2">
            @foreach ($menu->children as $child)
                @include('cms.menus.menu-item', ['menu' => $child])
            @endforeach
        </ul>
    @endif
</li>
