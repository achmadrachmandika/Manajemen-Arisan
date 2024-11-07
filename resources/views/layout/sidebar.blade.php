<nav class="sidebar-nav scroll-sidebar" data-simplebar>
    <ul id="sidebarnav">
        <!-- ============================= -->
        <!-- Home -->
        <!-- ============================= -->
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <!-- =================== -->
        <!-- Dashboard -->
        <!-- =================== -->
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('produk.index') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-package"></i>
                </span>
                <span class="hide-menu">Produk</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="index2.html" aria-expanded="false">
                <span>
                    <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">Iuran</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="index3.html" aria-expanded="false">
                <span>
                    <i class="ti ti-currency-dollar"></i>
                </span>
                <span class="hide-menu">Transaksi</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="index4.html" aria-expanded="false">
                <span>
                    <i class="ti ti-id-badge"></i>
                </span>
                <span class="hide-menu">Peserta</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="index5.html" aria-expanded="false">
                <span>
                    <i class="ti ti-activity-heartbeat"></i>
                </span>
                <span class="hide-menu">Laporan</span>
            </a>
        </li>

        <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <img src="{{asset('assets/dist/images/profile/user-1.jpg')}}" class="rounded-circle" width="40" height="40"
                        alt="">
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">Mathew</h6>
                    <span class="fs-2 text-dark">Designer</span>
                </div>
                <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout"
                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
            </div>
        </div>
</nav>