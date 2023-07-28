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
                                                <div class="col-lg-12">
                                                    <label for="radio-3" class="radio-style-3-label radio-small">Apakah
                                                        anda ingin nama anda ditampilkan?
                                                    </label>
                                                </div>
                                                <div class="col-lg-12 form-group">
                                                    <input type="radio" id="Ya" name="showName" value="ya">
                                                    <label for="Ya">Ya</label><br>
                                                    <input type="radio" id="Tidak" name="showName" value="tidak">
                                                    <label for="Tidak">Tidak</label><br>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <div class="col-lg-12">
                                                    <label for="radio-3" class="radio-style-3-label radio-small">Ketik
                                                        Nominal (Rp):
                                                        <input type="tel" placeholder="Ketikan jumlah uang"
                                                            class="form-control mt-2" name="amount" id="amount">
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <div class="col-lg-12">
                                                    <label for="payment_method">Berikan Pesan:</label>
                                                    <textarea name="comment" id="comment" cols="15" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <button class="button button-3d button-black m-0"
                                                    id="tombol_kirim_donation"
                                                    onclick="save_form('#tombol_kirim_donation','#form_create_donation','{{ route('payment', $data['id']) }}');">Bayar</button>
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
