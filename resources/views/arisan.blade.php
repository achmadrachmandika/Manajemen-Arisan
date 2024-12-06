@extends('layouts2.app')
@section('content')

{{-- <div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="assets/assets/img/carousel-1.jpg" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption-1">
                    <div class="carousel-caption-1-content" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase fw-bold mb-4 fadeInLeft animated"
                            data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;"
                            style="letter-spacing: 3px;">Importance life</h4>
                        <h1 class="display-2 text-capitalize text-white mb-4 fadeInLeft animated"
                            data-animation="fadeInLeft" data-delay="1.3s" style="animation-delay: 1.3s;">Always Want
                            Safe Water For Healthy Life</h1>
                        <p class="mb-5 fs-5 text-white fadeInLeft animated" data-animation="fadeInLeft"
                            data-delay="1.5s" style="animation-delay: 1.5s;">Lorem Ipsum is simply dummy text of the
                            printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                            text ever since the 1500s,
                        </p>
                        <div class="carousel-caption-1-content-btn fadeInLeft animated" data-animation="fadeInLeft"
                            data-delay="1.7s" style="animation-delay: 1.7s;">
                            <a class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2" href="#">Order
                                Now</a>
                            <a class="btn btn-secondary rounded-pill flex-shrink-0 py-3 px-5 ms-2" href="#">Free
                                Estimate</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/assets/img/carousel-2.jpg" class="img-fluid w-100" alt="Image">
                <div class="carousel-caption-2">
                    <div class="carousel-caption-2-content" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase fw-bold mb-4 fadeInRight animated"
                            data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;"
                            style="letter-spacing: 3px;">Importance life</h4>
                        <h1 class="display-2 text-capitalize text-white mb-4 fadeInRight animated"
                            data-animation="fadeInRight" data-delay="1.3s" style="animation-delay: 1.3s;">Always
                            Want Safe Water For Healthy Life</h1>
                        <p class="mb-5 fs-5 text-white fadeInRight animated" data-animation="fadeInRight"
                            data-delay="1.5s" style="animation-delay: 1.5s;">Lorem Ipsum is simply dummy text of the
                            printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy
                            text ever since the 1500s,
                        </p>
                        <div class="carousel-caption-2-content-btn fadeInRight animated" data-animation="fadeInRight"
                            data-delay="1.7s" style="animation-delay: 1.7s;">
                            <a class="btn btn-primary rounded-pill flex-shrink-0 py-3 px-5 me-2" href="#">Order
                                Now</a>
                            <a class="btn btn-secondary rounded-pill flex-shrink-0 py-3 px-5 ms-2" href="#">Free
                                Estimate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon btn btn-primary fadeInLeft animated" aria-hidden="true"
                data-animation="fadeInLeft" data-delay="1.1s" style="animation-delay: 1.3s;"> <i
                    class="fa fa-angle-left fa-3x"></i></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon btn btn-primary fadeInRight animated" aria-hidden="true"
                data-animation="fadeInLeft" data-delay="1.1s" style="animation-delay: 1.3s;"><i
                    class="fa fa-angle-right fa-3x"></i></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div> --}}

<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h4 class="modal-title mb-0" id="exampleModalLabel">Search by keyword</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="keywords"
                        aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text btn border p-3"><i
                            class="fa fa-search text-white"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->

<!-- feature Start -->
<div class="container-fluid feature bg-light py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="display-3 text-capitalize mb-3">Daftar Arisan yang diikuti {{ Auth::user()->name }}</h1>
        </div>
        <div class="row g-4">
            @foreach(Auth::user()->produk as $item)
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item p-4">
                    <div class="feature-icon mb-3">
                        @if($item->photo)
                        <img src="{{ Storage::url($item->photo) }}" alt="{{ $item->nama }}" class="img-fluid">
                        @else
                        <i class="fas fa-box-open text-white fa-3x"></i>
                        @endif
                    </div>
                    <a href="#" class="h4 mb-3">{{ $item->nama }}</a>
                    <p class="mb-3">{{ $item->deskripsi }}</p>
                    <p class="mb-3">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                    <a href="#" class="btn text-secondary">Lakukan Pembayaran <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- feature End -->


<!-- About Start -->
{{-- <div class="container-fluid about overflow-hidden py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="about-img rounded h-100">
                    <img src="assets/assets/img/about.jpg" class="img-fluid rounded h-100 w-100" style="object-fit: cover;" alt="">
                    <div class="about-exp"><span>20 Years Experiance</span></div>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="about-item">
                    <h4 class="text-primary text-uppercase">About Us</h4>
                    <h1 class="display-3 mb-3">We Deliver The Quality Water.</h1>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum quidem quas totam
                        nostrum! Maxime rerum voluptatem sed, facilis unde a aperiam nulla voluptatibus excepturi ipsam
                        iusto consequuntur
                    </p>
                    <div class="bg-light rounded p-4 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="pe-4">
                                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                            style="width: 80px; height: 80px;"><i
                                                class="fas fa-tint text-white fa-2x"></i></div>
                                    </div>
                                    <div class="">
                                        <a href="#" class="h4 d-inline-block mb-3">Satisfied Customer</a>
                                        <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas
                                            provident maiores quisquam.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-light rounded p-4 mb-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex">
                                    <div class="pe-4">
                                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center"
                                            style="width: 80px; height: 80px;"><i
                                                class="fas fa-faucet text-white fa-2x"></i></div>
                                    </div>
                                    <div class="">
                                        <a href="#" class="h4 d-inline-block mb-3">Standard Product</a>
                                        <p class="mb-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas
                                            provident maiores quisquam.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn btn-secondary rounded-pill py-3 px-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- About End -->

<div class="container-fluid feature bg-light py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h1 class="display-3 text-capitalize mb-3">Laporan Iuran {{ Auth::user()->name }}</h1>
        </div>
       <h1>Riwayat Pembayaran</h1>
    </div>
</div>


<!-- Fact Counter -->
{{-- <div class="container-fluid counter py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="counter-item">
                    <div class="counter-item-icon mx-auto">
                        <i class="fas fa-thumbs-up fa-3x text-white"></i>
                    </div>
                    <h4 class="text-white my-4">Happy Clients</h4>
                    <div class="counter-counting">
                        <span class="text-white fs-2 fw-bold" data-toggle="counter-up">456</span>
                        <span class="h1 fw-bold text-white">+</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="counter-item">
                    <div class="counter-item-icon mx-auto">
                        <i class="fas fa-truck fa-3x text-white"></i>
                    </div>
                    <h4 class="text-white my-4">Transport</h4>
                    <div class="counter-counting">
                        <span class="text-white fs-2 fw-bold" data-toggle="counter-up">513</span>
                        <span class="h1 fw-bold text-white">+</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="counter-item">
                    <div class="counter-item-icon mx-auto">
                        <i class="fas fa-users fa-3x text-white"></i>
                    </div>
                    <h4 class="text-white my-4">Employees</h4>
                    <div class="counter-counting">
                        <span class="text-white fs-2 fw-bold" data-toggle="counter-up">53</span>
                        <span class="h1 fw-bold text-white">+</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="counter-item">
                    <div class="counter-item-icon mx-auto">
                        <i class="fas fa-heart fa-3x text-white"></i>
                    </div>
                    <h4 class="text-white my-4">Years Experiance</h4>
                    <div class="counter-counting">
                        <span class="text-white fs-2 fw-bold" data-toggle="counter-up">17</span>
                        <span class="h1 fw-bold text-white">+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- Fact Counter -->

<!-- Service Start -->

<!-- Service End -->


<!-- Products Start -->
<div class="container-fluid product py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-uppercase text-primary">Produk Arisan yang tersedia</h4>
            <h1 class="display-3 text-capitalize mb-3"></h1>
        </div>
        <div class="row g-4 justify-content-center">
    @foreach($produk as $item)
    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="{{ $loop->iteration * 0.2 }}s">
        <div class="product-item">
            @if($item->photo) <!-- Jika produk memiliki gambar -->
            <img src="{{ Storage::url($item->photo) }}" class="img-fluid w-100 rounded-top" alt="{{ $item->nama }}">
            @else
            <img src="assets/assets/img/default-product.png" class="img-fluid w-100 rounded-top" alt="Image"> <!-- Gambar default jika tidak ada -->
            @endif
            <div class="product-content bg-light text-center rounded-bottom p-4">
                <p>{{ $item->quantity }} {{ $item->unit }}</p>
                <a href="#" class="h4 d-inline-block mb-3">{{ $item->nama }}</a>
                <p class="fs-4 text-primary mb-3">Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                <a href="#" class="btn btn-secondary rounded-pill py-2 px-4">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

    </div>
</div>
<!-- Products End -->


<!-- Blog Start -->
<!-- Blog End -->


<!-- Team End -->

@endsection