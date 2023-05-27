<x-user-layout title="Home" keywords="Del Donation Care">

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="tabs mx-auto mb-0 clearfix" id="tab-login-register" style="max-width: 500px;">

                    <div class="tab-container">

                        <div class="tab-content" id="tab-login">
                            <div class="card mb-0">
                                <div class="card-body" style="padding: 40px;">
                                    <form id="form_payment">
                                        <h4>Masukan Data Pembayaran Donasi</h4>

                                        <div class="row">

                                            <div class="col-12 form-group">

                                                <div class="col-lg-12">
                                                    <label for="payment_method">Pilih Jumlah Donasi:</label>

                                                    <div>
                                                        <input id="payment-1" class="radio-style" name="radio-group"
                                                            type="radio" checked>
                                                        <label for="payment-"
                                                            class="radio-style-1-label radio-small">Rp. 5,000</label>
                                                    </div>
                                                    <div>
                                                        <input id="payment-2" class="radio-style" name="radio-group"
                                                            type="radio">
                                                        <label for="payment-2"
                                                            class="radio-style-2-label radio-small">Rp. 10,000</label>
                                                    </div>
                                                    <div>
                                                        <input id="payment-3" class="radio-style" name="radio-group"
                                                            type="radio">
                                                        <label for="payment-3"
                                                            class="radio-style-3-label radio-small">Rp. 20,000</label>
                                                    </div>
                                                    <div>
                                                        <input id="payment-4" class="radio-style" name="radio-group"
                                                            type="radio">
                                                        <label for="payment-4"
                                                            class="radio-style-3-label radio-small">Rp. 50,000</label>
                                                    </div>
                                                    <div>
                                                        <input id="payment-5" class="radio-style" name="radio-group"
                                                            type="radio">
                                                        <label for="payment-5"
                                                            class="radio-style-3-label radio-small">Rp. 100,000</label>
                                                    </div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="radio-3" class="radio-style-3-label radio-small">Ketik
                                                        Nominal Donasi:</label>

                                                    <input type="text" placeholder="Ketikan nominal"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">

                                                <div class="col-lg-12">
                                                    <label for="payment_method">Berikan Pesan:</label>
                                                    <textarea name="" id="" cols="15" rows="5" class="form-control"></textarea>
                                                </div>

                                            </div>
                                            <div class="col-12 form-group">
                                                <button class="button button-3d button-black m-0" id="tombol-reset"
                                                    name="login-form-submit" value="login">Lakukan
                                                    Pembayaran</button>
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
