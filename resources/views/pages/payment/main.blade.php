<x-user-layout title="Home" keywords="Del Donation Care">

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="tabs mx-auto mb-0 clearfix" id="tab-login-register" style="max-width: 500px;">

                    <div class="tab-container">

                        <div class="tab-content" id="tab-login">
                            <div class="card mb-0">
                                <div class="card-body" style="padding: 40px;">
                                    <form id="form_create_donation">
                                        <h4>Masukan Data Pembayaran Donasi</h4>
                                        <div class="row">
                                            <div class="col-12 form-group">

                                                {{-- <div class="col-lg-12">
                                                    <label for="payment_method">Pilih Jumlah Donasi:</label>

                                                    <div>
                                                        <input id="payment-1" class="radio-style" name="amount"
                                                            type="radio" checked>
                                                        <label for="payment-"
                                                            class="radio-style-1-label radio-small">5000</label>
                                                    </div>
                                                    <div>
                                                        <input id="payment-2" class="radio-style" name="amount"
                                                            type="radio">
                                                        <label for="payment-2"
                                                            class="radio-style-2-label radio-small">10000</label>
                                                    </div>
                                                    <div>
                                                        <input id="payment-3" class="radio-style" name="amount"
                                                            type="radio">
                                                        <label for="payment-3"
                                                            class="radio-style-3-label radio-small">20000</label>
                                                    </div>
                                                    <div>
                                                        <input id="payment-4" class="radio-style" name="amount"
                                                            type="radio">
                                                        <label for="payment-4"
                                                            class="radio-style-3-label radio-small">50000</label>
                                                    </div>
                                                    <div>
                                                        <input id="payment-5" class="radio-style" name="amount"
                                                            type="radio">
                                                        <label for="payment-5"
                                                            class="radio-style-3-label radio-small">100000</label>
                                                    </div>
                                                </div> --}}

                                                <div class="col-12 form-group">
                                                    <label for="radio-3" class="radio-style-3-label radio-small">Ketik
                                                        Nominal (Rp):
                                                        <input type="tel" placeholder="Ketikan jumlah uang"
                                                            class="form-control mt-2" name="amount" id="amount">
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">

                                                <div class="col-lg-12">
                                                    <label for="payment_method">Berikan Pesan:</label>
                                                    <textarea name="comment" id="amount" cols="15" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <button class="button button-3d button-black m-0"
                                                    id="tombol_kirim_donation"
                                                    onclick="save_form('#tombol_kirim_donation','#form_create_donation','{{ route('payment', $data['id']) }}');">Bayar</button>
                                                {{-- <a href="javascript:;"
                                                    onclick="handle_confirm('Apakah Anda Yakin Ingin Membayar dengan Nominal tersebut?','Yakin','Tidak','POST','{{ route('payment', $data['id']) }}');"
                                                    class="button button-3d button-black m-0">Bayar</a> --}}
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>
</x-user-layout>
<script>
    ribuan('amount');
    var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
