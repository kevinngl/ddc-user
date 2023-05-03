<div class="modal-register mfp-hide" id="modal-register">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-header py-3 bg-transparent center">
            <h3 class="mb-0 fw-normal">Halo, Selamat Datang</h3>
        </div>
        <div class="card-body mx-auto p-5">

            <form id="login-form" name="login-form" class="mb-0 row" action="#" method="post">

                <div class="col-12">
                    <input type="text" id="login-form-username" name="login-form-username" value=""
                        class="form-control not-dark" placeholder="Email" />
                </div>

                <div class="col-12 mt-4">
                    <input type="password" id="login-form-password" name="login-form-password" value=""
                        class="form-control not-dark" placeholder="Password" />
                </div>

                <div class="col-12 text-end mt-2">
                    <a href="#" class="text-dark fw-light text-smaller">Lupa password?</a>
                </div>

                <div class="col-12 mt-4">
                    <button class="button w-100 m-0" id="login-form-submit" name="login-form-submit"
                        value="login">Masuk</button>
                </div>
            </form>
        </div>
        <div class="card-footer py-4 center">
            {{-- <p class="mb-0">Belum punya akun? <a href="{{ route('signup') }}"><u>Daftar</u></a></p> --}}
        </div>
    </div>
</div>
