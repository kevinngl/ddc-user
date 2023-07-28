<header id="header" class="transparent-header header-size-custom" data-sticky-shrink="false">
    <div id="header-wrap">
        <div class="container">
            <div class="header-row">

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="{{ route('home') }}" class="standard-logo"><img src="{{ asset('semicolon/ddc_1.png') }}"
                            alt="Canvas Logo"></a>
                    {{-- <a href="{{route('home')}}" class="standard-logo">Del Donation Care</a> --}}
                    <a href="{{ route('home') }}" class="retina-logo"><img src="{{ asset('semicolon/ddc_2.png') }}"
                            alt="Canvas Logo"></a>
                    {{-- <a href="{{route('home')}}" class="retina-logo">Del Donation Care</a> --}}
                </div><!-- #logo end -->

                <div class="header-misc">

                    <a href="{{ route('list') }}"
                        class="button button-small fw-semibold button-border button-rounded ls0 fw-medium nott">Donasi
                        Sekarang</a>
                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100">
                        <path
                            d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                        </path>
                        <path d="m 30,50 h 40"></path>
                        <path
                            d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                        </path>
                    </svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu">

                    <ul class="menu-container">

                        <li class="current menu-item"><a class="menu-link" href="{{ route('home') }}">
                                <div>Beranda</div>
                            </a></li>
                        @if (session('auth_token'))
                            <li class="menu-item">
                                <a class="menu-link" href="{{ route('profile') }}">
                                    <div>Profil</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="{{ route('logout') }}">
                                    <div>Logout</div>
                                </a>
                            </li>
                        @else
                            <li class="menu-item">
                                <a class="menu-link" href="{{ route('signin') }}">
                                    <div><i class="icon-line2-user fw-semibold"></i>Masuk</div>
                                </a>
                            </li>
                        @endif
                        <li class="menu-item"><a class="menu-link" href="{{ route('faq') }}">
                                <div>FAQ</div>
                            </a></li>
                    </ul>

                </nav><!-- #primary-menu end -->

            </div>
        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header>
