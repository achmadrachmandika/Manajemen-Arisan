<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menunggu Konfirmasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card-header {
            background-color: #17a2b8;
            color: white;
            text-align: center;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-body {
            text-align: center;
            padding: 2rem;
        }

        .waiting-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 1.5rem;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 20px;
            padding: 10px 25px;
            font-size: 1rem;
            text-decoration: none;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .lead {
            font-size: 1.2rem;
            color: #555;
            margin-bottom: 1.5rem;
        }

        .message {
            font-size: 1rem;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Akun Anda Sedang Menunggu Konfirmasi</h4>
                </div>
                <div class="card-body">
                    <img class="waiting-icon" src="https://img.icons8.com/ios-filled/100/000000/hourglass.png" alt="Waiting Icon">
                    <p class="lead">
                        Terima kasih telah mendaftar! Akun Anda sedang dalam proses konfirmasi oleh admin.
                    </p>
                    <p class="message">
                        Mohon tunggu beberapa saat, Anda akan diberitahu melalui WhatsApp jika akun Anda sudah disetujui.
                    </p>
                
                    <!-- Logout Button (Link) -->
                    <form id="login-form" action="{{ route('login') }}" method="GET" class="d-inline">
                        <button type="submit" class="btn-custom">Kembali</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>