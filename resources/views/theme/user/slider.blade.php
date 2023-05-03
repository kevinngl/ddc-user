<section id="slider" class="slider-element min-vh-100 include-header"
    style="background: url('demos/crowdfunding/images/hero.svg') no-repeat center bottom / cover;">
    <div class="slider-inner">

        <div class="vertical-middle">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-6 col-md-8">
                        <div class="slider-title">
                            <h1 class="fw-semibold">Mari membuat perubahan hari ini.</h1>
                            <p class="text-muted">Donasi kecil Anda dapat memberikan dampak besar bagi kehidupan
                                seseorang</p>
                        </div>
                        <a href="{{ route('list') }}" data-lightbox="inline"
                            class="button button-large fw-semibold button-rounded ls0 nott ms-0">Mulai Berdonasi</a>
                        @guest
                            <a href="{{ route('signin') }}"
                            class="button button-large fw-semibold button-border button-rounded ls0 nott">Sign In</a><br>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('semicolon/crowdfunding/images/1.jpg') }}" alt="" class="slider-img parallax"
            data-start="margin-top: 0px;" data-400="margin-top: 50px;">

    </div>
</section>
