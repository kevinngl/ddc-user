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
                            @if ($item->status == 'accepted')
                                <div class="col-lg-4 col-sm-6 mb-4">
                                    <div class="i-products">
                                        <div class="products-image">
                                            <a href="{{ route('single', $item->id) }}">
                                                <img src="{{ asset($item->campaign_image) }}" alt="Image 1">
                                                <span class="badge">{{ $item->category }}</span>
                                            </a>
                                        </div>
                                        <div class="products-desc">
                                            <h3><a href="{{ route('single', $item->id) }}">{{ $item->title }}</a>
                                            </h3>
                                            <p>{{ $item->description }}</p>
                                            <div class="clear"></div>
                                            <ul class="skills">
                                                <li data-percent="73">
                                                    <span class="d-flex justify-content-between w-100">
                                                        <span class="counter"><span data-from="0" data-to="73"
                                                                data-refresh-interval="10"
                                                                data-speed="2000"></span><strong>{{ $item->percentage }}%</strong>
                                                            Dana
                                                            Terkumpul</span>
                                                        <span class="counter"><span data-from="0" data-to="20"
                                                                data-refresh-interval="3"
                                                                data-speed="1200"></span>{{ $item->duration }} Hari
                                                            lagi</span>
                                                    </span>
                                                    <div class="progress"></div>
                                                </li>
                                            </ul>
                                            <div class="products-hoverlays">
                                                <span class="products-location"><i
                                                        class="icon-map-marker1"></i>{{ $item->location }}</span>
                                                <ul class="list-group-flush my-3 mb-0">
                                                    <li class="list-group-item"><strong>IDR
                                                            {{ number_format($item->achieved, 2, ',', '.') }}</strong>
                                                        Terkumpul
                                                    </li>
                                                    <li class="list-group-item"><strong>Kontributor</strong>
                                                        {{ $item->contributor }}</li>
                                                    <li class="list-group-item"><strong>{{ $item->duration }}</strong>
                                                        Hari lagi</li>
                                                </ul>
                                                <div class="product-user d-flex align-items-center mt-4">
                                                    <img src="{{ asset($item->pic_image) }}" alt="">
                                                    <a href="{{ route('single', $item->id) }}">{{ $item->pic_name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-user-layout>
