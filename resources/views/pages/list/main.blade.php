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
                                <input id="search-keyword" type="text" name="keywords" class="form-control w-auto"
                                    placeholder="Cari judul penggalangan.." />
                                <select class="form-select col col-4" id="searchByCategory">
                                    <option value="" {{ !isset($_GET['title']) ? 'selected' : '' }}>Semua
                                    </option>
                                    @foreach ($category as $item)
                                        <option
                                            value="{{ $item['id'] }}"{{ isset($_GET['categoryId']) && $item['id'] == $_GET['categoryId'] ? 'selected' : '' }}>
                                            {{ $item['name'] }}</option>
                                    @endforeach
                                </select>
                                <button class="btn bg-color text-white border-0" type="button"
                                    onclick="searchDonation()"><i class="icon-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
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
                                    <p>{{ $item['description'] }}</p>
                                    <div class="clear"></div>
                                    <ul class="skills">
                                        @php
                                            $progression = ($item['donationAchieved'] / $item['donationTarget']) * 100;
                                        @endphp
                                        <li data-percent="{{ $progression > 100 ? 100 : $progression }}">
                                            <span class="d-flex justify-content-between w-100">
                                                <span class="counter"><span data-from="{{ $item['donationAchieved'] }}"
                                                        data-to="{{ $item['donationTarget'] }}"
                                                        data-refresh-interval="10" data-speed="5000"></span><strong>Rp
                                                        {{ number_format($item['donationAchieved'], 0, '.', '.') }}</strong>
                                                    Terkumpul</span>
                                            </span>
                                            <div class="progress"></div>
                                        </li>
                                    </ul>
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
                <ul class="pagination justify-content-center mt-4">
                    <li class="page-item {{ $data->previousPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a>
                    </li>

                    @php
                        $currentPage = $data->currentPage();
                        $lastPage = $data->lastPage();
                        $startPage = max($currentPage - 1, 1);
                        $endPage = min($currentPage + 1, $lastPage);
                    @endphp

                    @for ($page = $startPage; $page <= $endPage; $page++)
                        <li class="page-item {{ $data->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ $data->url($page) }}">{{ $page }}</a>
                        </li>
                    @endfor

                    <li class="page-item {{ $data->nextPageUrl() ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a>
                    </li>
                </ul>
                {{-- {{ $donation->links() }} --}}
            </div>

        </div>
    </section>
    <script>
        document.getElementById('search-keyword').addEventListener('keydown', function(event) {
            if (event.keyCode === 13) { // Enter key pressed
                event.preventDefault();
                var searchQuery = this.value.trim();

                // Generate the new URL with additional query parameter
                var newUrl = "{{ url()->current() }}" + "?title=" + encodeURIComponent(searchQuery);

                // Redirect to the new URL
                window.location.href = newUrl;
            }
        });

        document.getElementById('searchByCategory').addEventListener("change", function() {
            var value = this.value;
            let text = this.options[this.selectedIndex].text;

            let newUrl = "{{ url()->current() }}" + "?categoryId=" + encodeURIComponent(value);
            if (value == "") {
                newUrl = "{{ url()->current() }}";
            }
            // Redirect to the new URL
            window.location.href = newUrl;
        });
    </script>
</x-user-layout>
