<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
@include('theme.auth.head')
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    {{ $slot }}
    <!--end::Main-->
    <!--begin::Javascript-->
    @include('theme.auth.js')
    @yield('custom_js')
    <!--end::Javascript-->
</body>

</html>
