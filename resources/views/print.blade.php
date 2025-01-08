<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <style>
        /* Compact and clean ATM-like print layout */
        body {
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 0;
            font-size: 14px;
            /* Increased font size for readability */
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            /* Align at the top of the page */
            padding-top: 20px;
            position: relative;
            /* Ensures absolute positioning of the logo */
        }

        /* Wrapper for content, restrict to top half of A4 page */
        .container {
            width: 100%;
            max-width: 210mm;
            /* Maximum A4 width */
            height: auto;
            padding: 20px;
            /* Add padding to create space around the content */
            box-sizing: border-box;
            border: 1px solid #ccc;
            text-align: left;
            background: #fff;
            overflow: hidden;
            margin: 0 auto;
            /* Center the container horizontally */
        }

        /* Logo positioning */
        .logo {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 100px;
            height: auto;
            margin: 0;
            padding: 0;
        }

        h3,
        p,
        table {
            margin: 0;
            padding: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 6px 8px;
            text-align: left;
            font-size: 12px;
        }

        th {
            font-weight: bold;
            text-transform: uppercase;
            background-color: #f5f5f5;
        }

        .badge {
            padding: 3px 6px;
            font-size: 10px;
            border-radius: 4px;
        }

        .bg-success {
            background-color: #28a745;
            color: white;
        }

        .bg-danger {
            background-color: #dc3545;
            color: white;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        @media print {
            body {
                font-size: 12px;
                margin: 0;
                padding: 0;
            }

            /* Set the print size to A4 */
            @page {
                size: A4;
                margin: 10mm;
                /* Set margin around the A4 page */
            }

            /* Centering the container on the page */
            .container {
                position: relative;
                width: 100%;
                max-width: 210mm;
                margin: 0 auto;
                padding: 20px;
            }

            .footer {
                margin-top: 10px;
            }

            /* Remove page numbers from print */
            .badge {
                font-size: 9px;
            }

            .logo {
                position: absolute;
                top: 10px;
                right: 10px;
                width: 100px;
                height: auto;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Logo section -->
        <img src="{{ asset('assets/assets/images/mebeladji1.jpg') }}" alt="Logo" class="logo">

        <h3>Detail Pembayaran arisan {{ $user->name }}</h3>
        <p><strong>Nama Peserta:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Nomor WA:</strong> {{ $user->no_wa }}</p>
        <p><strong>Alamat:</strong> {{ $user->alamat }}</p>

        <h4>Produk yang Diikuti</h4>
        <table>
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
                        $hargaBagian = $produk->harga / 11; // Harga tiap bagian (total harga dibagi 11)
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

        <div class="footer">
            <p>Terima kasih atas pembayaran Anda!</p>
        </div>
    </div>

    <script>
        // JavaScript for printing functionality
        window.onload = function() {
            window.print();  // Automatically open print dialog when the page is loaded
            window.onafterprint = function() {
                window.close();  // Close the window after printing
            };
        };
    </script>
</body>

</html>