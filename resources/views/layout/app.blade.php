<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Jul 2023 01:54:29 GMT -->

<head>
    <!--  Title -->
    <title>ArisanYUK!</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    
    <link rel="shortcut icon" type="image/png"
        href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" />
    <!-- Owl Carousel  -->
    <link rel="stylesheet" href="{{asset('assets/dist/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    
    <!-- Core Css -->
    <link id="themeColors" rel="stylesheet" href="{{asset('assets/dist/css/style.min.css')}}" />

 
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    
    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
            alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!-- Preloader -->
    <div class="preloader">
        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
            alt="loader" class="lds-ripple img-fluid" />
    </div>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="index-2.html" class="text-nowrap logo-img">
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg"
                            class="dark-logo" width="180" alt="" />
                        <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/light-logo.svg"
                            class="light-logo" width="180" alt="" />
                    </a>
                    <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8 text-muted"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->

                @include('layout.sidebar')
                {{-- <main class="py-4">--}}
                   

                   
                    <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
       <div class="body-wrapper">
            <!-- Header Start -->
            @include('layout.header')

            <!-- Main Content -->
          <div class="content-wrapper">
                @yield('content')
            </div>
           
        </div>
      
   
    </div>

</body>

  
    <!--  Import Js Files -->
    @yield('script')
    <script src="{{asset('assets/dist/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/dist/libs/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!--  core files -->
    <script src="{{asset('assets/dist/js/app.min.js')}}"></script>
    <script src="{{asset('assets/dist/js/app.init.js')}}"></script>
    <script src="{{asset('assets/dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('assets/dist/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/dist/js/custom.js')}}"></script>
    <!--  current page js files -->
    <script src="{{asset('assets/dist/libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    
    {{-- <script src="assets/dist/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="assets/dist/js/dashboard.js"></script> --}}
</body>

</html>