<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary"></i>Arisan Meubel Adji</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
             
               <a href="{{ auth()->user()->hasRole('pegawai') ? route('jadwalpegawai') : route('arisan') }}"
                class="nav-item nav-link active">
                Home
            </a>
                {{-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="feature.html" class="dropdown-item">Our Feature</a>
                        <a href="product.html" class="dropdown-item">Our Product</a>
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a> --}}
            </div>
            {{-- <div class="d-none d-xl-flex me-3">
                <div class="d-flex flex-column pe-3 border-end border-primary">
                    <a href="tel:+4733378901"><span class="text-primary">Free: + 0123 456 7890</span></a>
                </div>
            </div> --}}
            {{-- <button class="btn btn-primary btn-md-square d-flex flex-shrink-0 mb-3 mb-lg-0 rounded-circle me-3"
                data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button> --}}
            @if (auth()->check())
            <!-- Jika sudah login, tampilkan nama pengguna dan tombol logout -->
            <a href="#" class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">
                Hi, {{ auth()->user()->name }}
            </a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-outline-primary">Log Out</button>
            </form>
            @else
            <!-- Jika belum login, tampilkan tombol login -->
            <a href="{{ route('login') }}" class="btn btn-primary rounded-pill d-inline-flex flex-shrink-0 py-2 px-4">
                Login
            </a>
            @endif
        </div>
    </nav>

    <!-- Carousel Start -->
   
    <!-- Carousel End -->
</div>