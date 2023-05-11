const container = document.querySelector(".container");

function auth(button, form, uri, title) {
    $(button).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $(button).prop("disabled", true);
    $(button).html("Please wait");
    $.ajax({
        type: "POST",
        url: uri,
        data: data,
        dataType: "json",
        success: function (response) {
            if (response.alert == "success") {
                $(form)[0].reset();
                setTimeout(function () {
                    $(button).prop("disabled", false);
                    $(button).html(title);
                    if (response.callback) {
                        Swal.fire(
                            "Login Success!",
                            "" + response.message,
                            "success"
                        );

                        location.href = response.callback;
                    } else {
                        container.classList.remove("sign-up-mode");
                        $("#username_login").focus();
                    }
                }, 2000);
            } else {
                error_message(response.message);
                Swal.fire("Login Gagal", "" + response.message, "error");
                setTimeout(function () {
                    $(button).prop("disabled", false);
                    $(button).html(title);
                }, 2000);
            }
        },
    });
}
