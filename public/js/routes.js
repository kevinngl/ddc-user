function load_content_input(url) {
    // show_progress('input');
    $.post(url, {}, function(result) {
        $('#content_input').html(result);
        main_content('content_input');
        // hide_progress();
    }, "html");
}
function open_modal(id)
{
    $(id).modal('show');
}
function save_form(tombol,form,url)
{
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $(tombol).html("Harap tunggu");
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.alert=="success") {
                success_message(response.message);
                $(form)[0].reset();
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html("Kirim");
                    location.reload();
                }, 2000);
            } else {
                error_message(response.message);
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html("Kirim");
                }, 2000);
            }
        },
    });
    
}
function save_form_modal(tombol,form,url,modal, method)
{
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $(tombol).html("Harap tunggu");
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.alert=="success") {
                success_message(response.message);
                $(form)[0].reset();
                $(modal).modal('toggle');
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html("Submit");
                    load_list(1);
                }, 2000);
            } else {
                error_message(response.message);
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                    $(tombol).html("Submit");
                }, 2000);
            }
        },
    });
    
}
function upload_form_modal(tombol,form,url,modal,method)
{
    $(document).one('submit', form, function (e) {
        let data = new FormData(this);
        data.append('_method', 'POST');
        $(tombol).prop("disabled", true);
        $(tombol).html("Harap tunggu");
        $.ajax({
            type: method,
            url: url,
            data: data,
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            resetForm: true,
            processData: false,
            dataType: 'json',
            success: function (response) {
                if (response.alert=="success") {
                    success_message(response.message);
                    $(form)[0].reset();
                    $(modal).modal('hide');
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).html("Submit");
                        load_list(1);
                    }, 2000);
                } else {
                    error_message(response.message);
                    setTimeout(function () {
                        $(tombol).prop("disabled", false);
                        $(tombol).html("Submit");
                    }, 2000);
                }
            },
        });
        return false;
    });

}
function handle_open_modal(url,modal,content){
    $.ajax({
        type: "GET",
        url: url,
        success: function (html) {
            $(content).html(html);
            $(modal).modal('show');
        },
        error: function () {
            $(content).html('<h3>Ajax Bermasalah !!!</h3>')
        },
    });
}
function handle_delete(url){
    $.confirm({
        animationSpeed: 1000,
        animation: 'zoom',
        closeAnimation: 'scale',
        animateFromElement: false,
        columnClass: 'medium',
        title: 'Konfirmasi Hapus',
        content: 'Apa anda yakin ingin menghapus data ini ?',
        // icon: 'fa fa-question',
        theme: 'material',
        closeIcon: true,
        type: 'orange',
        autoClose: 'Batal|5000',
        buttons: {
            Ya: {
                btnClass: 'btn-red any-other-class',
                action: function(){
                    $.ajax({
                        type:"DELETE",
                        url: url,
                        dataType: "json",
                        success:function(response){
                            if (response.alert == "success") {
                                success_message(response.message);
                                load_list(1);
                            }else{
                                error_message(response.message);
                                load_list(1);
                            }
                        },
                    });
                }
            },
            Batal: {
                btnClass: 'btn-blue', // multiple classes.
                // ...
            }
        }
    });
}
function handle_confirm(title, confirm_title, deny_title, method, route){
    Swal.fire({
        title: title,
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: confirm_title,
        denyButtonText: deny_title,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: method,
                url: route,
                dataType: 'json',
                success: function(response) {
                    if(response.redirect == "input"){
                        load_input(response.route);
                    }else{
                        load_list(1);
                    }
                    Swal.fire(response.message, '', response.alert)
                }
            });
        } else if (result.isDenied) {
            Swal.fire('Konfirmasi dibatalkan', '', 'info')
        }
    });
}
function handle_save_password(tombol, form, url, method){
    $(tombol).submit(function () {
        return false;
    });
    let data = $(form).serialize();
    $(tombol).prop("disabled", true);
    $(tombol).html("Please wait");
    $.ajax({
        type: method,
        url: url,
        data: data,
        dataType: 'json',
        beforeSend: function() {
            
        },
        success: function (response) {
            if (response.alert=="success") {
                success_message(response.message);
                $(form)[0].reset();
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                      location.href = response.route;
                }, 2000);
            } else {
                error_message(response.message);
                setTimeout(function () {
                    $(tombol).prop("disabled", false);
                }, 2000);
            }
        },
    });
}