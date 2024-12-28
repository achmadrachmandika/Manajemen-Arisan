<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Identity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .register-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .register-card .form-label {
            font-weight: 600;
        }

        .register-card .btn-next {
            background-color: #007bff;
            color: white;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
        }

        .register-card .btn-next:hover {
            background-color: #0056b3;
        }

        .register-card .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-text {
            font-size: 36px;
            font-weight: bold;
            color: #ff6347;
            /* Warna solid, misalnya tomat */
        }

        .text-center p {
            font-size: 18px;
            color: #888;
        }
    </style>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="register-card col-md-6 col-lg-4">
            <div class="card-body form-bg">
                <div class="logo text-center">
                    <h1 class="logo-text">MEUBELADJI</h1>
                </div>

                <h3 class="text-center mb-4">Pendaftaran - Identitas</h3>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('register.identity.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Masukkan Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required placeholder="Nama">
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="Alamat">
                    </div>

                    <div class="mb-3">
                        <label for="no_wa" class="form-label">Nomor WhatsApp</label>
                        <input type="text" class="form-control" id="no_wa" name="no_wa" required placeholder="Nomor WA">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Masukkan Email</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Email">
                    </div>

                    <button type="submit" class="btn-next">Selanjutnya</button>

                    <div class="text-center mt-4">
                        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>