<!DOCTYPE html>
<html dir="ltr" lang="en-US">
@include('theme.user.head')

<body class="stretched">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Login/Register Modal -->
        {{-- @include('theme.user.modalPayment') --}}

        {{-- @include('theme.user.modal') --}}
        <!-- Header
  ============================================= -->
        @include('theme.user.header')
        <!-- #header end -->

        <!-- Slider
  ============================================= -->
        @if (request()->is('home'))
            @include('theme.user.slider')
        @endif

        <!-- #Slider End -->

        <!-- Content
  ============================================= -->
        {{ $slot }}
        <!-- #content end -->

        <!-- Footer
  ============================================= -->
        @include('theme.user.footer')
        <!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
        ============================================= -->
    <div id="gotoTop" class="icon-line-arrow-up"></div>

    <!-- JavaScripts
            ============================================= -->
    @include('theme.user.js')
    @yield('custom_js')


</body>

</html>
