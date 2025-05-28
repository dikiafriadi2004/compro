<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">

    <meta name="keywords" content="{{ $meta_keyword ?? seo('meta_keyword') }}">
    <meta name="description" content="{{ $meta_description ?? seo('meta_description') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- shortcut icon-->
    @php
        $faviconPath = $favicon
            ? asset(getenv('CUSTOM_UPLOAD_LOCATION') . '/' . $favicon)
            : asset('backend/assets/images/logo/favicon.png');

        $logoPath = $logo
            ? asset(getenv('CUSTOM_UPLOAD_LOCATION') . '/' . $logo)
            : asset('backend/assets/images/logo/logo.png');

    @endphp

    <link rel="icon" href="{{ $faviconPath }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ $faviconPath }}" type="image/x-icon">


    <title>{{ $web_name }} | @yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
</head>

<body>
    {{-- Navbar --}}
    @include('frontend.layouts.navbar')

    {{-- Content --}}
    @yield('content')

    {{-- footer --}}
    @include('frontend.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
