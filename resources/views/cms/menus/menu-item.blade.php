<li data-id="{{ $menu->id }}">
    {{ $menu->title }} <small>({{ $menu->full_url }})</small>
    @if ($menu->children->count())
        <ul class="sortable">
            @foreach ($menu->children as $child)
                @include('cms.menus.menu-item', ['menu' => $child])
            @endforeach
        </ul>
    @endif
</li>
