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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="assets/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="assets/assets/css/style.css" rel="stylesheet">

    <style>
        /* Customizing fonts and overall page aesthetics */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fb;
            color: #444;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 50px 20px;
        }

        h3,
        h4 {
            font-weight: 600;
            color: #333;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table td {
            background-color: white;
            border-color: #ddd;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
        }

        .badge.bg-success {
            background-color: #28a745;
        }

        .badge.bg-danger {
            background-color: #dc3545;
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .modal-footer button {
            background-color: #28a745;
            color: white;
        }

        .product-item img {
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .product-item img:hover {
            transform: scale(1.05);
        }

        .product-content {
            padding: 20px;
            background: linear-gradient(135deg, #6e7fcb, #5575f5);
            color: white;
            border-radius: 0 0 10px 10px;
            text-align: center;
        }

        .product-content a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
        }

        .product-content .fs-4 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .product-content .btn {
            background-color: #ffba00;
            color: #333;
            border-radius: 20px;
            font-size: 1.2rem;
            padding: 10px 20px;
        }

        .product-content .btn:hover {
            background-color: #f79c42;
        }
    </style>

</head>

<body>

    <!-- Header Start -->
    <div class="container-fluid position-relative p-0">
        @include('layouts2.header')
    </div>
    <!-- Header End -->

<div class="container">
    <!-- Logo Section -->
    <div class="text-center mb-4">
        <h3>Detail Produk yang Dipilih Peserta</h3>
    </div>

    <!-- Peserta dan Produk yang Diikuti -->
    <h4>Peserta dan Produk yang Diikuti</h4>
   <div class="table-responsive">
            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
        <thead>
            <tr>
                <th style="text-align: center">Nama Peserta</th>
                <th style="text-align: center">Produk yang Diikuti</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pegawai as $user)
            @if(!in_array('pegawai', $user->roles->pluck('name')->toArray()) && !in_array('super_admin',
            $user->roles->pluck('name')->toArray()))
            <tr>
                <td style="text-align: center">{{ $user->name }}</td>
                <td style="text-align: center">
                    <ul>
                        @foreach($user->produk as $produk)
                        <br>{{ $produk->nama }}</br>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>

<!-- Tabel Produk Summary -->
<div class="table-responsive">
    <table id="zero_config1" class="table border table-striped table-bordered text-nowrap">
        <thead>
            <tr>
                <th style="text-align: center">Nama Produk</th>
                <th style="text-align: center">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produkSummary as $produk)
            <tr>
                <td style="text-align: center">{{ $produk->nama_produk }}</td>
                <td style="text-align: center">{{ $produk->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

    <!-- Footer Start -->
    @include('layouts2.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
   <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="assets/assets/lib/wow/wow.min.js"></script>
    <script src="assets/assets/lib/easing/easing.min.js"></script>
    <script src="assets/assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/assets/lib/counterup/counterup.min.js"></script>
    <script src="assets/assets/lib/owlcarousel/owl.carousel.min.js"></script>
    
    <!-- Template Javascript -->
    <script src="assets/assets/js/main.js"></script>
    
    <script>
        $(document).ready(function() {
                $('#zero_config').DataTable({
                    "paging": true,
                    "ordering": true,
                    "info": true
                });
            });
    </script>

    <script>
        $(document).ready(function() {
                    $('#zero_config1').DataTable({
                        "paging": true,
                        "ordering": true,
                        "info": true
                    });
                });
    </script>
</body>

</html>