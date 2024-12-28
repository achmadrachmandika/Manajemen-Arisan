{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css') }}">
    <title>Arisan-Login</title>
    <style>
        .full-bg {
            background-image: url('assets/assets/images/Login-Bg1.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <section class="full-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <a href="#" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                            <img src="assets/assets/images/mebeladji.png" width= "180" alt="Meubel Adji" class="img-fluid mb-2">
                        </a>
                    <div class="card mb-0">
                    
                        <div class="card-body">
                          
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Selamat Datang di Arisan Mebel
                                Adji</h2>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Silahkan Login jika sudah
                                memiliki akun</h2>

                            <!-- Notifikasi Status -->
                            @if (session('status'))
                            <div class="alert alert-info">
                                {{ session('status') }}
                            </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input id="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        type="email" name="email" placeholder=" " value="{{ old('email') }}" required />
                                    <label for="email" class="form-label">Email</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input id="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        type="password" name="password" placeholder=" " required />
                                    <label for="password" class="form-label">Password</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <span toggle="#password" class="fa fa-eye toggle-password"
                                        style="cursor: pointer;"></span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" value=""
                                            id="flexCheckChecked" checked>
                                        <label class="form-check-label text-dark" for="flexCheckChecked">Remember this
                                            Device</label>
                                    </div>
                                    <a class="text-primary fw-medium" href="authentication-forgot-password.html">Forgot
                                        Password?</a>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-medium">New to Arisan Mebel Adji?</p>
                                    <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Create an
                                        account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.querySelector('.toggle-password').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/authentication-login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jul 2023 02:01:04 GMT -->

<head>
    <!--  Title -->
    <title>Arisan Meubel Adji</title>
    <style>
        .form-bg {
        background-image: url('assets/assets/images/Login-Bg1.png');
        background-size: cover; /* Make sure the background image covers the entire area */
        background-position: center; /* Center the background image */
        background-repeat: no-repeat; /* Prevent the background image from repeating */
        }
        .preloader {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f7f7f7; /* Optional: Set a background color for the preloader */
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 9999;
        }
        
        .animated-loader {
        animation: spin 2s linear infinite;
        }
        
        @keyframes spin {
        0% {
        transform: rotate(0deg);
        }
        100% {
        transform: rotate(360deg);
        }
        }
        </style>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Jadilah orang baik itu." />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png"
        href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" />
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="assets/dist/css/style.min.css" />
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/assets/images/mebeladji1.jpg') }}" alt="loader"
            class="lds-ripple img-fluid animated-loader" />
    </div>
    <!-- Preloader -->
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed"
        data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body form-bg">
                                <!-- Added class form-bg here -->
                                <a href="#" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                    <img src="assets/assets/images/mebeladji.png" alt="Logo Mebel Adji"
                                        title="Logo Mebel Adji" loading="lazy" style="width: 70%; height: auto;">
                                </a>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                   <div class="form-floating mb-3">
                                    <input id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" type="email"
                                        name="email" placeholder=" " value="{{ old('email') }}" required style="color: white;">
                                    <label for="email" class="form-label">Email</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" type="password"
                                        name="password" placeholder=" " required style="color: white;">
                                    <label for="password" class="form-label">Password</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                    <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Masuk</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-medium">Daftar untuk mengikuti Mebel Adji?</p>
                                       <a class="text-white fw-medium ms-2" href="{{ route('register.identity') }}">Buat Akun</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Import Js Files -->

    <script src="{{ asset('assets/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--  core files -->
    <script src="{{ asset('assets/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/dist/js/custom.js') }}"></script>
    <!--  current page js files -->
    <script src="{{ asset('assets/dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
</body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/authentication-login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jul 2023 02:01:04 GMT -->

</html>