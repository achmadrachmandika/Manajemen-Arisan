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
        {{-- <li class="sidebar-item">
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
        </li> --}}
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('peserta.index') }}" aria-expanded="false">
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

</nav>