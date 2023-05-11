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
                                    placeholder="Cari judul donasi.." onkeyup="handleKeyDownSearch(event)" />
                                <select class="form-select col col-4">
                                    <option selected value="All">All</option>
                                    <option value="Business">Business</option>
                                    <option value="Design">Design</option>
                                    <option value="Tech">Tech</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Music">Music</option>
                                    <option value="Software">Software</option>
                                    <option value="Hardware">Hardware</option>
                                </select>
                                <button class="btn bg-color text-white border-0" type="button"
                                    onclick="searchDonation()"><i class="icon-search"></i></button>
                            </div>
                            <a class="button button-rounded" href="#" role="button">Popular</a>
                            <a class="button button-rounded button-dark button-black" href="#"
                                role="button">Newest</a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
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
                <ul class="pagination justify-content-center mt-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"
                            aria-disabled="true"> <span class="op-05" aria-hidden="true">&laquo;</span></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                aria-hidden="true">&raquo;</span></a></li>
                </ul>
                {{-- {{ $donation->links() }} --}}
            </div>

        </div>
    </section>
    {{-- @section('custom_js')
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
    @endsection --}}
</x-user-layout>
