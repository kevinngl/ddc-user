<script src="{{ asset('semicolon/js/jquery.js') }}"></script>
<script src="{{ asset('semicolon/js/plugins.min.js') }}"></script>

<!-- Footer Scripts
============================================= -->
<script src="{{ asset('semicolon/js/functions.js') }}"></script>

<!-- ADD-ONS JS FILES -->
<script>
    // Get the modal elements
    var modal1 = document.getElementById("modal-form-1");
    var modal2 = document.getElementById("modal-form-2");

    // Get the button that opens the modal
    var continueButton = document.getElementById("continue-button");

    // When the user clicks on <span> (x), close the modal
    var spans = document.getElementsByClassName("close");
    for (var i = 0; i < spans.length; i++) {
        spans[i].onclick = function() {
            modal1.style.display = "none";
            modal2.style.display = "none";
        }
    }
</script>


<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!-- <script src="{{ asset('js/semicolon/js/functions.js') }}"></script> -->
<script src="{{ asset('js/documentation.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('js/plugin.js') }}"></script>
<script src="{{ asset('js/method-office.js') }}"></script>
<script src="{{ asset('js/swa2.js') }}"></script>
<script src="{{ asset('js/toastr.js') }}"></script>
<script src="{{ asset('js/regex.js') }}"></script>
<script src="{{ asset('js/routes.js') }}"></script>
<script src="{{ asset('js/auth.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
<!--end::Page Custom Javascript-->
