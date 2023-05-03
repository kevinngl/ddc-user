<x-user-layout title="Home" keywords="Del Donation Care">

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="tabs mx-auto mb-0 clearfix" id="tab-login-register" style="max-width: 500px;">

                    <div class="tab-container">

                        <div class="tab-content" id="tab-login">
                            <div class="card mb-0">
                                <div class="card-body" style="padding: 40px;">
                                    <form id="form_reset">
                                        <h3>Ganti Password</h3>
                                        <input type="hidden" value="{{ $token }}" name="token">

                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="password">Password Baru:</label>
                                                <input type="password" id="password" name="password" value=""
                                                    class="form-control" />
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="password">Password Konfirmasi:</label>
                                                <input type="password" id="password" name="password_confirmation"
                                                    value="" class="form-control" />
                                            </div>
                                            <div class="col-12 form-group">
                                                <button class="button button-3d button-black m-0" id="tombol-reset"
                                                    onclick="handle_post('#tombol-reset','#form_reset','{{ route('reset.password.post') }}','POST');"
                                                    name="login-form-submit" value="login">Ganti Password</button>
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
