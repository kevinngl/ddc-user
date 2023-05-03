<div id="kt_aside" class="aside pb-5 pt-5 pt-lg-0" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'80px', '300px': '100px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo py-8" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center">
            <img alt="Logo" src="{{ asset('assets/ddc.png') }}" class="h-45px logo" />
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid" id="kt_aside_menu">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-2 my-lg-5 pe-lg-n1" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
            data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold"
                id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item py-2">
                    <a class="menu-link menu-center {{ request()->is('dashboard') ? 'active' : '' }}"
                        href="{{ route('office.dashboard') }}" data-bs-trigger="hover" data-bs-dismiss="click"
                        data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-house fs-2"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
                <div class="menu-item py-2">
                    <a class="menu-link menu-center {{ request()->is('cash') ? 'active' : '' }}"
                        href="{{ route('office.cash.index') }}" data-bs-trigger="hover" data-bs-dismiss="click"
                        data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-file-text fs-2"></i>
                        </span>
                        <span class="menu-title">Donasi Tunai</span>
                    </a>
                </div>
                <div class="menu-item py-2">
                    <a class="menu-link menu-center {{ request()->is('donation') ? 'active' : '' }}"
                        href="{{ route('office.donation.index') }}" data-bs-trigger="hover" data-bs-dismiss="click"
                        data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-file-text fs-2"></i>
                        </span>
                        <span class="menu-title">Program Donasi</span>
                    </a>
                </div>
                @if (Auth::user()->role == 'admin')
                    <div class="menu-item py-2">
                        <a class="menu-link menu-center {{ request()->is('category') ? 'active' : '' }}"
                            href="{{ route('office.category.index') }}" data-bs-trigger="hover" data-bs-dismiss="click"
                            data-bs-placement="right">
                            <span class="menu-icon me-0">
                                <i class="bi bi-file-text fs-2"></i>
                            </span>
                            <span class="menu-title">Kategori Donasi</span>
                        </a>
                    </div>
                @endif
                @if (Auth::user()->role == 'supervisor')
                    <div class="menu-item py-2">
                        <a class="menu-link menu-center {{ request()->is('users') ? 'active' : '' }}"
                            href="{{ route('office.users.index') }}" data-bs-trigger="hover" data-bs-dismiss="click"
                            data-bs-placement="right">
                            <span class="menu-icon me-0">
                                <i class="bi bi-people fs-2"></i>
                            </span>
                            <span class="menu-title">Role Pengguna</span>
                        </a>
                    </div>
                @endif

            </div>

            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->

</div>
