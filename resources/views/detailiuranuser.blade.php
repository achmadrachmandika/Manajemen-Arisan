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
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
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

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table td {
            background-color: white;
            border-color: #ddd;
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
            <h3>Detail Pembayaran Arisan {{ $user->name }}</h3>
        </div>

        <!-- User Details -->
        <div class="mb-4">
            <p><strong>Nama Peserta:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Nomor WA:</strong> {{ $user->no_wa }}</p>
            <p><strong>Alamat:</strong> {{ $user->alamat }}</p>
        </div>

        <!-- Produk yang Diikuti -->
        <h4>Produk yang Diikuti</h4>
        <div class="table-responsive">
            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->produk as $produk)
                    <tr>
                        <td>{{ $produk->nama }}</td>
                        <td>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</td>
                        <td>
                            @foreach(range(1, 11) as $i)
                            @php
                            $status = $produk->pivot['status_bagian_' . $i];
                            $tanggal = $produk->pivot['tanggal_bagian_' . $i] ?? '-';
                            $statusClass = $status == 'terbayar' ? 'bg-success' : 'bg-danger';
                            $hargaBagian = $produk->harga / 11;
                            @endphp
                            <p>Iuran {{ $i }}:
                                <span class="badge {{ $statusClass }}">{{ ucfirst($status) }}</span>
                                <span>(Rp. {{ number_format($hargaBagian, 0, ',', '.') }})</span>
                            </p>
                            @if($status == 'terbayar' && $tanggal != '-')
                            <p><strong>Tanggal Pembayaran:</strong> {{ $tanggal }}</p>
                            @endif
                            @endforeach
                        </td>
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
</body>

</html>