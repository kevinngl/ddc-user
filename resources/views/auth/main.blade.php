<x-user-layout title="Home" keywords="Del Donation Care">
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="accordion accordion-lg mx-auto mb-0 clearfix" style="max-width: 550px;">

                    <div class="accordion-header">
                        <div class="accordion-icon">
                            <i class="accordion-closed icon-lock3"></i>
                            <i class="accordion-open icon-unlock"></i>
                        </div>
                        <div class="accordion-title">
                            Masuk ke akun anda
                        </div>
                    </div>
                    <div class="accordion-content clearfix">
                        <form id="form_login">
                            @csrf
                            <div class="col-12 form-group">
                                <label for="login-form-email">Email:</label>
                                <input type="email" id="login-form-email" name="email" value=""
                                    class="form-control" />
                            </div>

                            <div class="col-12 form-group">
                                <label for="login-form-password">Password:</label>
                                <input type="password" id="login-form-password" name="password" value=""
                                    class="form-control" />
                            </div>

                            <div class="col-12 form-group">
                                <button class="button button-3d button-black m-0" id="tombol_login" type="button"
                                    onclick="auth('#tombol_login','#form_login','{{ route('login') }}','login');">Login</button>
                                <a href="{{route('forgot-password')}}" class="float-end">Lupa password?</a>
                            </div>
                        </form>
                    </div>

                    <div class="accordion-header">
                        <div class="accordion-icon">
                            <i class="accordion-closed icon-user4"></i>
                            <i class="accordion-open icon-ok-sign"></i>
                        </div>
                        <div class="accordion-title">
                            Belum punya akun? Daftar sekarang
                        </div>
                    </div>
                    <div class="accordion-content clearfix">
                        <form id="form_register">
                            @csrf
                            <div class="col-12 form-group">
                                <label for="register-form-name">Nama Lengkap:</label>
                                <input type="text" id="register-form-name" name="name" value=""
                                    class="form-control" />
                            </div>

                            <div class="col-12 form-group">
                                <label for="register-form-email">Email:</label>
                                <input type="text" id="register-form-email" name="email" value=""
                                    class="form-control" />
                            </div>

                            <div class="col-12 form-group">
                                <label for="register-form-password">Choose Password:</label>
                                <input type="password" id="register-form-password" name="password" value=""
                                    class="form-control" />
                            </div>

                            <div class="col-12 form-group">
                                <button class="button button-3d button-black m-0" id="tombol_register" type="button"
                                    onclick="user_auth('#tombol_register','#form_register','{{ route('register') }}','Register');">Daftar</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script>
        function user_auth(button, form, uri, title) {
            $(button).submit(function() {
                return false;
            });
            let data = $(form).serialize();
            $(button).prop("disabled", true);
            $(button).html("Please wait");
            $.ajax({
                type: "POST",
                url: uri,
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.alert == "success") {
                        Swal.fire({
                            text: response.message,
                            icon: "success",
                            buttonsStyling: !1,
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(function() {
                            if (response.callback) {
                                location.href = response.callback;
                            } else if (response.login) {
                                auth_content(response.login);
                            }
                        });
                    } else {
                        Swal.fire({
                            text: response.message,
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, Mengerti!",
                            customClass: {
                                confirmButton: "btn btn-danger"
                            },
                        });
                    }
                },
            });
        }
    </script>

</x-user-layout>
