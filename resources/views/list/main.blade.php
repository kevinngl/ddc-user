<x-user-layout title="Home" keywords="Del Donation Care">
    <section id="content">
        <div class="content-wrap pt-0">

            <div class="section mt-0 overflow-visible">
                <div class="container">
                    <div class="row justify-content-center center">
                        <div class="col-lg-7">
                            <div class="heading-block border-bottom-0 mb-4">
                                <h2 class="mb-3">Ingin berdonasi? Pilih donasi</h2>
                                <p class="text-muted mb-0">Silahkan pilih dan cari berbagai kategori dan nama program
                                    donasi yang anda ingin berikan sumbangan.</p>
                            </div>
                            <div class="input-group input-group-lg mb-4">
                                <button class="btn bg-color text-white border-0" type="button"
                                    onclick="searchDonation()"><i class="icon-search"></i></button>
                                <input id="search-keyword" type="text" name="keywords" class="form-control w-auto"
                                    placeholder="Cari judul donasi.." onkeyup="handleKeyDownSearch(event)" />
                                <select class="form-select col col-4" id='category-select'>
                                    @if ($category)
                                        @foreach ($category as $c)
                                            @if ($selectedCategory == $c->tc_title)
                                                <option selected
                                                    value="{{ route('list') }}?category={{ $c->tc_title }}">
                                                    {{ $c->tc_title }}</option>
                                            @else
                                                <option value="{{ route('list') }}?category={{ $c->tc_title }}">
                                                    {{ $c->tc_title }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    <!-- Item 1 -->
                    @foreach ($donation as $item)
                        @if ($item->td_status == 'accepted')
                            <div class="col-lg-4 col-sm-6 mb-4">
                                <div class="i-products">
                                    <div class="products-image">
                                        <a href="{{ route('single', [$item->td_title]) }}">
                                            <img src="{{ asset($item->td_image) }}" alt="Image 1">
                                            <span class="badge">{{ $item->category->tc_title }}</span>
                                        </a>
                                    </div>
                                    <div class="products-desc">
                                        <h3><a
                                                href="{{ route('single', [$item->td_title]) }}">{{ $item->td_title }}</a>
                                        </h3>
                                        <p>{{ $item->td_description }}</p>
                                        <div class="clear"></div>
                                        <ul class="skills">
                                            <li data-percent="73">
                                                <span class="d-flex justify-content-between w-100">
                                                    <span class="counter"><span data-from="0" data-to="73"
                                                            data-refresh-interval="10"
                                                            data-speed="2000"></span><strong>%</strong> Dana
                                                        Terkumpul</span>
                                                    <span class="counter"><span data-from="0" data-to="20"
                                                            data-refresh-interval="3" data-speed="1200"></span>
                                                        @php
                                                            $date1 = date_create($item->td_duration_end);
                                                            $date2 = date_create($item->td_duration_started);
                                                            $diff = date_diff($date2, $date1);
                                                            echo $diff->format('%a');
                                                        @endphp
                                                        Hari lagi</span>
                                                </span>
                                                <div class="progress"></div>
                                            </li>
                                        </ul>
                                        <div class="products-hoverlays">
                                            <span class="products-location"><i
                                                    class="icon-map-marker1"></i>{{ $item->td_location }}</span>
                                            <ul class="list-group-flush my-3 mb-0">
                                                <li class="list-group-item"><strong>IDR 1.257.000</strong> Terkumpul
                                                </li>
                                                <li class="list-group-item"><strong>30</strong> Donatur</li>
                                                <li class="list-group-item"><strong>Kontribusi</strong> 37</li>
                                                <li class="list-group-item"><strong>20</strong> Hari lagi</li>
                                            </ul>
                                            <div class="product-user d-flex align-items-center mt-4">
                                                <img src="{{ asset($item->photo) }}" alt="">
                                                <a href="{{ route('single', [$item->td_title]) }}">{{ $item->user->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

                {{ $donation->links() }}
            </div>

        </div>
    </section>
    @section('custom_js')
        <script>
            function searchDonation() {
                var keyword = document.getElementById('search-keyword');

                window.location.href = '?donation-title=' + keyword.value;
            }

            function handleKeyDownSearch(event) {
                var keyword = document.getElementById('search-keyword');
                if (event.key === "Enter" || event.key === "enter") {
                    window.location.href = '?donation-title=' + keyword.value;
                }
            }

            // Get the <select> element
            var select = document.getElementById('category-select');

            // Redirect the user when an option is selected
            select.addEventListener('change', function() {
                var selectedOption = select.options[select.selectedIndex];
                if (selectedOption.value) {
                    window.location.href = selectedOption.value;
                }
            });
        </script>
        <script>
            load_list(1);
        </script>
    @endsection
</x-user-layout>
