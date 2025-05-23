<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="description" content="Konter Digital Aplikasi Server Pulsa">
    <meta name="keywords" content="Konter Digital Aplikasi Server Pulsa">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- shortcut icon-->
    <link rel="icon" href="{{ asset('backend/assets/images/logo/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/logo/favicon.png') }}" type="image/x-icon">
    <!-- Fonts css  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&amp;display=swap" rel="stylesheet">
    <!-- Font awesome -->
    <link href="{{ asset('backend/assets/css/vendor/font-awesome.css') }}" rel="stylesheet">
    <!-- Scrollbar-->
    <link href="{{ asset('backend/assets/css/vendor/simplebar.css') }}" rel="stylesheet">
    <!-- Bootstrap css-->
    <link href="{{ asset('backend/assets/css/vendor/bootstrap.css') }}" rel="stylesheet">
    <!-- Custom css-->
    <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">

    @stack('css')
</head>

<body>
    <!-- Loader Start-->
    <!-- Loader End-->
    <!-- Header Start-->
    @include('cms.layouts.navbar')

    <!-- Header End-->
    <!-- sidebar start-->
    @include('cms.layouts.sidebar')

    <!-- sidebar end-->
    <div class="themebody-wrap">
        <!-- breadcrumb start-->
        @yield('breadcrumb')

        <!-- breadcrumb end-->
        <!-- theme body start-->
        @yield('content')

        <!-- theme body end-->
    </div>
    <!-- footer start-->
    @include('cms.layouts.footer')
    <!-- footer end-->
    <!-- back to top start //-->
    <div class="scroll-top"><i class="fa fa-angle-double-up"></i></div>
    <!-- back to top end //-->
    <!-- main jquery-->
    <script src="{{ asset('backend/assets/js/jquery-3.7.1.min.js') }}"></script>
    <!-- Config -->
    <script src="{{ asset('backend/assets/js/layout-config.js') }}"></script>
    <!-- Customizer-->
    <script src="{{ asset('backend/assets/js/customizer.js') }}"></script>
    <!-- Feather icons js-->
    <script src="{{ asset('backend/assets/js/icons/feather-icon/feather.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Scrollbar-->
    <script src="{{ asset('backend/assets/js/vendors/simplebar.js') }}"></script>

    @stack('js')

    <!-- Custom script-->
    <script src="{{ asset('backend/assets/js/custom-script.js') }}"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="description" content="Konter Digital Aplikasi Server Pulsa">
    <meta name="keywords" content="Konter Digital Aplikasi Server Pulsa">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

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
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container main-navbar">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('frontend/assets/images/logo.png') }}" class="logo" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section>
        <div class="header mt-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 copywriting align-self-center">
                        <h1 class="big-header mb-10">
                            Konter Digital, <br>
                            Solusi Segala <br>
                            Kebutuhan <br>
                            Usaha
                        </h1>
                        <p class="primary-copy mb-30">
                            Konter Digital adalah solusi segala kebutuhan Perjalanan
                            usaha Mitra dalam membuka Peluang baru
                        </p>
                        <a href="#" class="btn btn-cta mb-30">
                            <i class="fa-brands fa-google-play"></i>
                            Download Sekarang
                        </a>
                    </div>
                    <div class="col-lg-7">
                        <img src="{{ asset('frontend/assets/images/images1.png') }}" class="img-fluid"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="produk mt-70">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <h3 class="medium-header mb-30">
                            Produk Unggulan
                        </h3>
                    </div>
                </div>
            </div>
            <div class="carousel mb-30">
                <div class="carousel-wrapper">
                    <div class="mr-30">
                        <img src="{{ asset('fronted/assets/images/ic_axis.png') }}" class="ic-logos" alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('fronted/assets/images/ic_axis.png') }}" class="ic-logos" alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('fronted/assets/images/ic_axis.png') }}" class="ic-logos" alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_indosat.png') }}" class="ic-logos"
                            alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_tri.png') }}" class="ic-logos" alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_dana.png') }}" class="ic-logos"
                            alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_ovo.png') }}" class="ic-logos" alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_gopay.png') }}" class="ic-logos"
                            alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_shopeepay.png') }}" class="ic-logos"
                            alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_linkaja.png') }}" class="ic-logos"
                            alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_telkomsel.png') }}" class="ic-logos"
                            alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_xl.png') }}" class="ic-logos" alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_axis.png') }}" class="ic-logos"
                            alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_indosat.png') }}" class="ic-logos"
                            alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_tri.png') }}" class="ic-logos" alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_dana.png') }}" class="ic-logos"
                            alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_ovo.png') }}" class="ic-logos" alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_gopay.png') }}" class="ic-logos"
                            alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_shopeepay.png') }}" class="ic-logos"
                            alt="">
                    </div>
                    <div class="mr-30">
                        <img src="{{ asset('frontend/assets/images/ic_linkaja.png') }}" class="ic-logos"
                            alt="">
                    </div>
                </div>
            </div>
    </section>

    <section>
        <div class="keunggulan mt-70">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <h3 class="medium-header mb-30">
                            Keunggulan Aplikasi Konter Digital
                        </h3>
                        <p class="primary-copy mb-30">
                            Beberapa Keunggulan Aplikas Konter Digital
                        </p>
                    </div>
                    <div class="row keunggulan-wrapper">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="big-keunggulan-card">
                                        <div class="icon mb-20">
                                            <img src="{{ asset('frontend/assets/images/icon_cs.png') }}" alt="">
                                        </div>
                                        <div class="copy">
                                            <h3 class="small-header mb-10">
                                                Customer Service
                                            </h3>
                                            <p class="primary-copy mb-20">
                                                Siap Melayani anda 24jam
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="big-keunggulan-card">
                                        <div class="icon mb-20">
                                            <img src="{{ asset('frontend/assets/images/icon_mitra.png') }}" alt="">
                                        </div>
                                        <div class="copy">
                                            <h3 class="small-header mb-10">
                                                Mitra Terdaftar
                                            </h3>
                                            <p class="primary-copy mb-20">
                                                Tersebar di seluruh penjuru Indonesia menggerakkan perekonomian sektor
                                                kecil
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="big-keunggulan-card">
                                        <div class="icon mb-20">
                                            <img src="{{ asset('frontend/assets/images/icon_reward.png') }}" alt="">
                                        </div>
                                        <div class="copy">
                                            <h3 class="small-header mb-10">
                                                Reward
                                            </h3>
                                            <p class="primary-copy mb-20">
                                                Banyak keuntungan yang anda dapatkan untuk menjadi bagian dari mitra
                                                Konter Digital
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="big-keunggulan-card">
                                        <div class="icon mb-20">
                                            <img src="{{ asset('frontend/assets/images/icon_produk.png') }}" alt="">
                                        </div>
                                        <div class="copy">
                                            <h3 class="small-header mb-10">
                                                Produk
                                            </h3>
                                            <p class="primary-copy mb-20">
                                                Anda bisa membeli / Menjual kembali, Beberapa Produk, Pulsa, Paket Data,
                                                Paket Tlpn, Voucher
                                                Game, E Money, Token PLN, dll
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="operasional mt-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('frontend/assets/images/illustration.png') }}" alt="" class="img-fluid">
                            </div>
                            <div class="col-lg-6 operational-copy">
                                <h3 class="medium-header mb-30">
                                    Operasional dan pengaturan aplikasi
                                    yang mudah dan praktis
                                </h3>
                                <p class="primary-copy mb-30">
                                    1. Registrasi (Download & Install Konter Digital dari Playstore) <br>
                                    2. Login dengan menggunakan nomor hp dan pin kamu <br>
                                    3. Masukan OTP dari Whatsapp yg dikirim oleh Konter Digital <br>
                                    4. Untuk dapat transaksi lakukan Topup deposit <br>
                                    5. Kembangkan jaringan downline jika anda ingin menjadikan Konter Digital
                                    menjadi sebuah aplikasi bisnis yang menguntungkan.
                                </p>
                                <a href="#" class="btn btn-cta">
                                    <i class="fa-brands fa-google-play"></i>
                                    Download Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container mt-70">
            <div class="row col-lg-12">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <h3 class="medium-header mb-30">
                            BLOG
                        </h3>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <div class="card">
                        <img src="{{ asset('frontend/assets/images/images1.png') }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <a href="konterdigital.com" class="card-title-blog">Dukungan Pemerintah Terhadap
                                Konter Digital Di Era Sekarang</a>
                            <p class="card-text-blog">Bagi kebanyakan orang yang ingin
                                memulai bisnis pulsa h2h murah, tentu
                                tidak akan familiar dengan beberapa
                                terminologinya. Contohnya adalah pulsa…
                            </p>
                            <span class="date-blog">26 Mei 2023</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <div class="card">
                        <img src="{{ asset('frontend/assets/images/images1.png') }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <a href="konterdigital.com" class="card-title-blog">Dukungan Pemerintah Terhadap
                                Konter Digital Di Era Sekarang</a>
                            <p class="card-text-blog">Bagi kebanyakan orang yang ingin
                                memulai bisnis pulsa h2h murah, tentu
                                tidak akan familiar dengan beberapa
                                terminologinya. Contohnya adalah pulsa…
                            </p>
                            <span class="date-blog">26 Mei 2023</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-30">
                    <div class="card">
                        <img src="{{ asset('frontend/assets/images/images1.png') }}" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <a href="konterdigital.com" class="card-title-blog">Dukungan Pemerintah Terhadap
                                Konter Digital Di Era Sekarang</a>
                            <p class="card-text-blog">Bagi kebanyakan orang yang ingin
                                memulai bisnis pulsa h2h murah, tentu
                                tidak akan familiar dengan beberapa
                                terminologinya. Contohnya adalah pulsa…
                            </p>
                            <span class="date-blog">26 Mei 2023</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="mt-70">
        <div class="container">
            <div class="row col-lg-12">
                <div class="row col-lg-12 mb-30">
                    <div class="col-lg">
                        <div class="logo-footer mb-3">
                            <img src="{{ asset('frontend/assets/images/logo.png') }}" class="logo" alt="">
                        </div>
                        <div>
                            <h3 class="footer-copy">
                                PT. Media Usaha Digital Kreatif <br>
                                Jl. KR. Kalok III, No. 363 <br>
                                Desa Lam bheu <br>
                                Kec. Darul Imarah <br>
                                Aceh Besar
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="nav-footer mb-2">
                            Tentang Kami
                        </div>
                        <div class="footer-copy">
                            <ul class="navbar-footer">
                                <li>
                                    <a href="">Produk</a>
                                </li>
                                <li>
                                    <a href="">Blog</a>
                                </li>
                                <li>
                                    <a href="">Privacy Police</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="nav-footer mb-2">
                            Telegram
                        </div>
                        <div class="footer-copy">
                            <ul class="navbar-footer">
                                <li>
                                    Chat : <a href="https://t.me/cs_konterdigital">CS_KONTERDIGITAL</a>
                                </li>
                                <li>
                                    Channel : <a href="https://t.me/ptmudk">konterdigitalofc</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="nav-footer mb-2">
                            Customer Service
                        </div>
                        <div class="footer-copy">
                            <ul class="navbar-footer">
                                <li>
                                    Whatsapp : <a href="https://wa.me/6282165348577?text=Hallo...">0821-6534-8577</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr>
                <h3 class="footer-copy">
                    All Right Reserved by PT. Media Usaha Digital Kreatif
                </h3>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
