<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Arisan MEUBELADJI</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="assets/assets/lib/animate/animate.min.css" rel="stylesheet">
        <link href="assets/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="assets/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="assets/assets/css/style.css" rel="stylesheet">
    </head>

    <body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div>
        @include('layouts2.header')
        {{-- <main class="py-4">--}}
            @yield('content')
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Alert!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Anda Belum Melakukan Login! Klik OK jika ingin ke halaman login
                        </div>
                        {{-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a href="{{route ('donation')}}" type="button" class="btn btn-primary">OK</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
            {{--
        </main>--}}
    

    @include('layouts2.footer')

    <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="assets/assets/lib/wow/wow.min.js"></script>
        <script src="assets/assets/lib/easing/easing.min.js"></script>
        <script src="assets/assets/lib/waypoints/waypoints.min.js"></script>
        <script src="assets/assets/lib/counterup/counterup.min.js"></script>
        <script src="assets/assets/lib/owlcarousel/owl.carousel.min.js"></script>
        
        
        <!-- Template Javascript -->
        <script src="assets/assets/js/main.js"></script>
        </body>
        
        </html>

