@php
    use App\Models\CMS\Page;

    $pages = cache()->remember('navbar_pages', 60, fn() => Page::all());
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
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home.index') ? 'active' : '' }}"
                        href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('blog.*') ? 'active' : '' }}"
                        href="{{ route('blog.index') }}">Blog</a>
                </li>

                @foreach ($pages as $page)
                    @php
                        $isContact = $page->slug === 'contact';
                        $url = $isContact ? route('contact.index') : url($page->slug);
                        $active = $isContact
                            ? request()->routeIs('contact.index') ? 'active' : ''
                            : (request()->is($page->slug) ? 'active' : '');
                    @endphp
                    <li class="nav-item">
                        <a class="nav-link {{ $active }}" href="{{ $url }}">
                            {{ $page->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
