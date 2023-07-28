<x-user-layout title="Home" keywords="Del Donation Care">
    <section id="content">
        <div class="content-wrap p-0">

            <div class="section border-0 bg-transparent mb-1">
                <div class="container">
                    <div class="row justify-content-between align-items-end bottommargin">
                        <div class="col-md-7">
                            <div class="heading-block border-bottom-0 mb-3">
                                <h2>Ingin berdonasi? Silahkan pilih</h2>
                            </div>
                            <p class="text-muted mb-0">Silahkan lihat berbagai iri donasi yang dapat anda cari dan
                                pilih.</p>
                        </div>
                        <div class="col-md-5 d-flex flex-row justify-content-md-end mt-4 mt-md-0">
                            <a href="{{ route('list') }}" data-lightbox="inline"
                                class="button button-large fw-semibold button-rounded ls0 nott ms-0">Semua</a>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Item 1 -->
                        @foreach ($data as $item)
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
                                        <h3><a href="{{ route('single', $item['id']) }}">{{ $item['title'] }}</a>
                                        </h3>
                                        <p>Terkumpul Rp {{ number_format($item['donationAchieved'], 0, '.', '.') }}</p>
                                        <div class="clear"></div>
                                        {{-- @if ($data['donationTarget'] != 0) --}}
                                        <ul class="skills">
                                            @php
                                                $progression = ($item['donationAchieved'] / $item['donationTarget']) * 100;
                                            @endphp
                                            <li data-percent="{{ $progression > 100 ? 100 : $progression }}">
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
                                        {{-- @endif --}}
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
            </div>
        </div>
    </section>
</x-user-layout>
