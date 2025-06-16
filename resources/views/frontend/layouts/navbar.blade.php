@php
    use Illuminate\Support\Str;

    $currentPath = request()->path(); // ex: '', 'blog', 'blog/slug'
@endphp

<nav class="navbar navbar-expand-lg bg-white">
    <div class="container main-navbar">
        <a class="navbar-brand" href="{{ route('home.index') }}">
            <img src="{{ $logoPath }}" class="logo" alt="{{ $web_name }}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                @foreach ($menus as $menu)
                    @php
                        $menuPath = ltrim(parse_url($menu->url, PHP_URL_PATH), '/');

                        // Deteksi aktif
                        $isActive = '';

                        if ($menu->type === 'home' && $currentPath === '/') {
                            $isActive = 'active';
                        } elseif (Str::startsWith($currentPath, $menuPath)) {
                            $isActive = 'active';
                        }

                        // Cek anak
                        foreach ($menu->children as $child) {
                            $childPath = ltrim(parse_url($child->url, PHP_URL_PATH), '/');
                            if (Str::startsWith($currentPath, $childPath)) {
                                $isActive = 'active';
                                break;
                            }
                        }
                    @endphp

                    {{-- Menu dengan dropdown --}}
                    @if ($menu->children && $menu->children->count())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ $isActive }}" href="#"
                                id="menuDropdown{{ $menu->id }}" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ $menu->title }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="menuDropdown{{ $menu->id }}">
                                @foreach ($menu->children as $child)
                                    @php
                                        $childPath = ltrim(parse_url($child->url, PHP_URL_PATH), '/');
                                        $childActive = Str::startsWith($currentPath, $childPath) ? 'active' : '';
                                    @endphp
                                    <li>
                                        <a class="dropdown-item {{ $childActive }}" href="{{ url($child->url) }}">
                                            {{ $child->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        {{-- Menu biasa --}}
                        <li class="nav-item">
                            <a class="nav-link {{ $isActive }}" href="{{ url($menu->url) }}">
                                {{ $menu->title }}
                            </a>
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    </div>
</nav>
