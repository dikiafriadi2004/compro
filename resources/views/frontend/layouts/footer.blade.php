<footer class="footer">
    <div class="container">
        <div class="row col-lg-12">
            <div class="row col-lg-12 mb-30">
                <div class="col-lg">
                    <div class="logo-footer mb-3">
                        <img src="{{ $logoPath }}" class="logo" alt="{{ $web_name }}">
                    </div>
                    <div>
                        <h3 class="footer-copy">
                            {{ $nama_pt }} <br>
                            {{ $alamat }}
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
                                Chat : <a href="https://t.me/{{ $telegram }}">{{ $telegram }}</a>
                            </li>
                            <li>
                                Channel : <a href="https://t.me/{{ $ch_telegram }}">{{ $ch_telegram }}</a>
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
                                Whatsapp : <a href="https://api.whatsapp.com/send?phone={{ $whatsapp }}">{{ $whatsapp }}</a>
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
