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
                                    <a target="_blank" href="https://wa.me/{{ $data['pic']['phone'] }}"><i
                                            class="icon-whatsapp"></i> Hubungi:
                                        {{ $data['pic']['name'] }}</a>
                                </div><!-- .tagcloud end -->
                                <!-- Tag Cloud
                                ============================================= -->

                                <div class="clear"></div>

                            </div>
                            @include('pages.single.copy-link')

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
                                    <!-- Item 1 -->
                                    <h4>Program Kampanye Lainnya</h4>
                                    <div class="row">
                                        @foreach ($allCampaign as $item)
                                            <div class="col-lg-4 col-sm-6 mb-4">
                                                <div class="i-products">
                                                    <div class="products-image">
                                                        <a href="{{ route('single', $item['id']) }}">
                                                            <img src="{{ $item['image']['filePath'] ?? 'https://images.bisnis.com/posts/2021/12/10/1476128/donasi.jpeg' }}"
                                                                alt="Image 1"
                                                                style="background-image: url(...); background-size: cover; width: 100%; height: 100%;">
                                                            <span class="badge">{{ $item['category']['name'] }}</span>
                                                        </a>
                                                    </div>
                                                    <div class="products-desc">
                                                        <h3><a
                                                                href="{{ route('single', $item['id']) }}">{{ $item['title'] }}</a>
                                                        </h3>
                                                        <p>{{ $item['donationAchieved'] }}</p>
                                                        <div class="clear"></div>
                                                        @if ($data['donationTarget'] != 0)
                                                            <ul class="skills">
                                                                @php
                                                                    $progression = ($item['donationAchieved'] / $item['donationTarget']) * 100;
                                                                @endphp
                                                                <li
                                                                    data-percent="{{ $progression > 100 ? 100 : $progression }}">
                                                                    <span class="d-flex justify-content-between w-100">
                                                                        <span class="counter"><span
                                                                                data-from="{{ $item['donationAchieved'] }}"
                                                                                data-to="{{ $item['donationTarget'] }}"
                                                                                data-refresh-interval="10"
                                                                                data-speed="5000"></span><strong>Rp
                                                                                {{ number_format($item['donationAchieved'], 0, '.', '.') }}</strong>
                                                                            Terkumpul</span>
                                                                    </span>
                                                                    <div class="progress"></div>
                                                                </li>
                                                            </ul>
                                                        @endif
                                                        <div class="products-hoverlays">
                                                            <ul class="list-group-flush my-3 mb-0">
                                                                <li class="list-group-item">
                                                                    Target donasi
                                                                    <strong>Rp
                                                                        {{ number_format($item['donationTarget'], 0, '.', '.') }}</strong>
                                                                </li>
                                                                <li class="list-group-item">
                                                                    @php
                                                                        $date1 = date_create($item['endDate']);
                                                                        $date2 = date_create(date('Y-m-d H:i:s'));
                                                                        $dateDiff = date_diff($date1, $date2);
                                                                    @endphp
                                                                    Tersisa
                                                                    <strong>{{ $dateDiff->format('%a') }}</strong>
                                                                    Hari lagi
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
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
                                {{-- @if ($data['donationTarget'] != 0) --}}
                                <span class="text-uppercase text-smaller op-07">Target Dana Rp.
                                    {{ number_format($data['donationTarget'], 2, ',', '.') }}</span>
                                <ul class="skills mt-4">
                                    @php
                                        $progression = ($data['donationAchieved'] / $data['donationTarget']) * 100;
                                    @endphp
                                    <li data-percent="{{ $progression > 100 ? 100 : $progression }}"
                                        style="height: 7px">
                                        <span class="d-flex justify-content-between w-100">
                                            <span class="counter counter-xs h6"><span
                                                    data-from="{{ $data['donationAchieved'] }}"
                                                    data-to="{{ $data['donationTarget'] }}" data-refresh-interval="10"
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
                                {{-- @else --}}
                                {{-- <span class="text-uppercase text-smaller op-07">Tanpa Target Dana</span>
                                @endif --}}
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
