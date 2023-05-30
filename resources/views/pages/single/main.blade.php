<x-user-layout title="Home" keywords="Del Donation Care">
    <section id="content">
        <div class="content-wrap">

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row justify-content-between align-items-end">

                            <div class="col-auto">
                                <!-- Title
                                ============================================= -->
                                <h2 class="nott ls0 h2 fw-bold">{{ $data['title'] }}</h2>
                                <p class="text-muted mb-1">Diposting pada tanggal
                                    {{ strftime('%e %B %Y, %H:%M', strtotime($data['createdAt'])) }} WIB</p>
                                <!-- Tag Cloud
                                ============================================= -->
                                <div class="tagcloud my-3 clearfix">
                                    <a target="_blank" href="https://wa.me/{{ $data['pic']['phone'] }} ?? 0">Penulis:
                                        {{ $data['pic']['name'] }}</a>
                                </div><!-- .tagcloud end -->
                                <!-- Tag Cloud
                                ============================================= -->

                                <div class="clear"></div>

                            </div>

                            <div class="col-auto order-md-last mb-4 mt-4 mb-md-0">
                                <a href="#" id="notifylink" data-bs-toggle="dropdown" data-bs-offset="0,15"
                                    aria-haspopup="true" aria-expanded="false" data-offset="0,12"><i
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Share"
                                        class="icon-line-share btn btn-secondary"></i></a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="notifylink">
                                    <a class="dropdown-item" href="#"><i
                                            class="icon-facebook me-2"></i>Facebook</a>
                                    <a class="dropdown-item" href="#"><i class="icon-twitter me-2"></i>Twitter</a>
                                    <a class="dropdown-item" href="#"><i
                                            class="icon-whatsapp me-2"></i>Whatsapp</a>
                                    <a class="dropdown-item" href="#"><i class="icon-code me-2"></i>Embedded</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gutter-40 col-mb-80 mt-4">

                    <!-- Post Content
                    ============================================= -->
                    <div class="postcontent col-lg-8">

                        <div class="single-post mb-0">

                            <!-- Single Post
                            ============================================= -->
                            <div class="entry clearfix">

                                <!-- Entry Image
                                ============================================= -->
                                <div class="entry-image mt-2">
                                    <div class="mb-2">
                                        <img src="{{ $data['image']['filePath'] ?? 'https://images.bisnis.com/posts/2021/12/10/1476128/donasi.jpeg' }}"
                                            alt="Image" class="mb-3">
                                    </div>
                                </div>


                                <!-- .entry-image end -->


                                <!-- Entry Content
                                ============================================= -->
                                <div class="entry-content mt-4">
                                    <div class="tagcloud my-3 clearfix">
                                        <a href="#">Kategori : {{ $data['category']['name'] }}</a>
                                    </div><!-- .tagcloud end -->
                                    <div id="section-desc" class="page-section">
                                        <p>{{ $data['description'] }}</p>
                                    </div>

                                    <div class="line"></div>

                                    <div id="section-faqs" class="page-section">
                                        <h2>Tanya Jawab</h2>


                                        <div class="toggle toggle-bg">
                                            <div class="toggle-header">
                                                <div class="toggle-icon">
                                                    <i class="toggle-closed icon-question-sign"></i>
                                                    <i class="toggle-open icon-question-sign"></i>
                                                </div>
                                                <div class="toggle-title">
                                                    Bagaimana cara saya berdonasi?
                                                </div>
                                            </div>
                                            <div class="toggle-content">
                                                <p>1. <b>Pilih Metode Donasi Anda:</b> Pilih metode yang sesuai untuk
                                                    Anda. Anda dapat berdonasi melalui kartu kredit, PayPal, atau
                                                    transfer bank. Semua metode pembayaran aman, sehingga Anda dapat
                                                    berdonasi dengan tenang.</p>
                                                <p>2. <b>Pilih Jumlah Donasi Anda:</b> Pilih jumlah yang ingin Anda
                                                    donasikan. Setiap sedikit bantuan sangat berarti, jadi jangan
                                                    khawatir jika Anda hanya bisa memberikan sedikit.</p>
                                                <p>3. <b>Isi Detail Anda:</b> Untuk memastikan bahwa kami dapat
                                                    memproses donasi Anda dengan benar, harap isi detail Anda dengan
                                                    akurat. Kami akan memerlukan nama Anda, alamat email, dan informasi
                                                    tambahan yang dibutuhkan oleh metode pembayaran yang Anda pilih.</p>
                                                <p>4. <b>Konfirmasi Donasi Anda:</b> Periksa detail Anda dan konfirmasi
                                                    donasi Anda. Anda akan diarahkan ke gateway pembayaran yang aman
                                                    untuk menyelesaikan donasi Anda.</p>
                                                <p>5. <b>Lihat Bukti Pembayaran Anda:</b> Setelah menyelesaikan donasi
                                                    Anda, Anda akan menerima email konfirmasi dan tanda terima. Harap
                                                    simpan tanda terima Anda untuk catatan Anda sendiri.</p>
                                                <p>Terima kasih atas kemurahan hati Anda! Donasi Anda akan memiliki
                                                    dampak positif pada kehidupan mereka yang membutuhkan.</p>

                                            </div>
                                        </div>

                                        <div class="toggle toggle-bg">
                                            <div class="toggle-header">
                                                <div class="toggle-icon">
                                                    <i class="toggle-closed icon-comments-alt"></i>
                                                    <i class="toggle-open icon-comments-alt"></i>
                                                </div>
                                                <div class="toggle-title">
                                                    Siapa yang mengelola donasi?
                                                </div>
                                            </div>
                                            <div class="toggle-content">Del Donation Care merupakan sebuah website yang
                                                dikelola oleh Departemen Sosial Dan Agama yang dinaungi oleh Badan
                                                Eksekutif Mahasiswa Institut Teknologi Del</div>
                                        </div>

                                        <div class="toggle toggle-bg">
                                            <div class="toggle-header">
                                                <div class="toggle-icon">
                                                    <i class="toggle-closed icon-lock3"></i>
                                                    <i class="toggle-open icon-lock3"></i>
                                                </div>
                                                <div class="toggle-title">
                                                    Kepada siapa donasi diberikan?
                                                </div>
                                            </div>
                                            <div class="toggle-content">Donasi yang diberikan sesuai dengan program
                                                donasi yang dibuat, biasanya saat terjadi bencana alam, kabar duka cita
                                                dari salah satu mahasiswa, dan berbagai jenis lainnya.</div>
                                        </div>

                                        <div class="toggle toggle-bg">
                                            <div class="toggle-header">
                                                <div class="toggle-icon">
                                                    <i class="toggle-closed icon-download-alt"></i>
                                                    <i class="toggle-open icon-download-alt"></i>
                                                </div>
                                                <div class="toggle-title">
                                                    Apakah saya bisa melakukan donasi dengan uang tunai?
                                                </div>
                                            </div>
                                            <div class="toggle-content"><b>Bisa</b>, anda bisa melakukan donasi secara
                                                tunai dengan menghubungi kontak berikut ini</div>
                                        </div>

                                        <div class="toggle toggle-bg">
                                            <div class="toggle-header">
                                                <div class="toggle-icon">
                                                    <i class="toggle-closed icon-ok"></i>
                                                    <i class="toggle-open icon-ok"></i>
                                                </div>
                                                <div class="toggle-title">
                                                    Apakah pembayaran donasi di website ini terpercaya?
                                                </div>
                                            </div>
                                            <div class="toggle-content"><b>Ya</b>, karena sistem pembayaran yang website
                                                ini menggunakan payment gateway midtrans yang merupakan layanan jembatan
                                                pembayaran yang terjamin keamanannya.</div>
                                        </div>
                                    </div>

                                    <!-- Post Single - Content End -->

                                </div>
                            </div><!-- .entry end -->

                        </div>

                    </div><!-- .postcontent end -->

                    <!-- Sidebar
                    ============================================= -->
                    <div class="sidebar col-lg-4">
                        <div class="sidebar-widgets-wrap">

                            <div>
                                <h3 class="fw-bold mb-2 color">Rp
                                    {{ number_format($data['donationAchieved'], 2, ',', '.') }}
                                    Terkumpul</h3>
                                <span class="text-uppercase text-smaller op-07">Target Dana Rp.
                                    {{ number_format($data['donationTarget'], 2, ',', '.') }}</span>
                                <p class="text-uppercase text-smaller op-07">
                                    {{ $donationCount }} kontribusi</p>
                                <ul class="skills mt-4">
                                    @php
                                        $progression = ($data['donationAchieved'] / $data['donationTarget']) * 100;
                                    @endphp
                                    <li data-percent="{{ $progression > 100 ? 100 : $progression }}"
                                        style="height: 7px">
                                        <span class="d-flex justify-content-between w-100">
                                            <span class="counter counter-xs h6"><span
                                                    data-from="{{ $data['donationAchieved'] }}"
                                                    data-to="{{ $data['donationTarget'] }}"
                                                    data-refresh-interval="10"
                                                    data-speed="2000"></span><strong>{{ $progression > 100 ? 100 : $progression }}%</strong>
                                            </span>
                                            <span class="counter counter-xs h6"><span data-from="0" data-to="20"
                                                    data-refresh-interval="3"
                                                    data-speed="1200"></span>{{ $data['duration'] }} Hari
                                                Lagi</span>
                                        </span>
                                        <div class="progress"></div>
                                    </li>
                                </ul>

                            </div>
                            <div class="clear mt-4"></div>
                            <a href="{{ route('donate', $data['id']) }}"
                                data-lightbox="inline"class="button button-xlarge fw-semibold button-rounded ls0 nott ms-0 my-4 w-100 text-center">Berikan
                                Donasi</a>
                            {{-- <a href="#modal-payment" data-lightbox="inline">Test
                                Donasi</a> --}}
                            <!-- Post Author Info
                            ============================================= -->
                            @include('pages.single.donation')
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-user-layout>
