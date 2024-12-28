<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css') }}">
    <title>Arisan-Register</title>
    {{-- <style>
        .full-bg {
            background-image: url('assets/assets/images/Login-Bg1.png');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style> --}}
</head>

<body>
    <section class="full-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="text-center mb-4">
                        <a href="#!" class="text-decoration-none">
                            <h1 class="text-center">Meubel Adji</h1>
                        </a>
                    </div>
                    <div class="card border border-light-subtle rounded-3 shadow-sm">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="text-center mb-3">
                                <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Register</h2>
                            </div>
                            @if (session('register_success'))
                            <div class="alert alert-success">
                                {{ session('register_success') }}
                            </div>
                            @endif
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input id="name" type="text"
                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <label for="name" class="form-label">Name</label>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input id="alamat" type="text"
                                        class="form-control form-control-lg @error('alamat') is-invalid @enderror"
                                        name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat"
                                        autofocus>
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input id="no_wa" type="text"
                                        class="form-control form-control-lg @error('no_wa') is-invalid @enderror"
                                        name="no_wa" value="{{ old('no_wa') }}" required autocomplete="no_wa" autofocus
                                        inputmode="numeric" pattern="[0-9]*"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    <label for="no_wa" class="form-label">Nomor WA</label>
                                    @error('no_wa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input id="email" type="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <label for="email" class="form-label">Email</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input id="password" type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">
                                    <label for="password" class="form-label">Password</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <span toggle="#password" class="fa fa-eye toggle-password"
                                        style="cursor: pointer;"></span>
                                </div>

                                <div class="form-floating mb-3">
                                    <input id="password-confirm" type="password" class="form-control form-control-lg"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="produk">Pilih Produk</label>
                                    <div id="produk-list">
                                        @foreach($produks as $produk)
                                        <div class="form-check">
                                            <input class="form-check-input produk-checkbox" type="checkbox"
                                                name="produk_id[]" value="{{ $produk->produk_id }}"
                                                id="produk{{ $produk->produk_id }}" data-harga="{{ $produk->harga }}">
                                            <label class="form-check-label" for="produk{{ $produk->produk_id }}">
                                                {{ $produk->nama }} - Rp{{ number_format($produk->harga, 0, ',', '.') }}
                                            </label>
                                            @if($produk->photo)
                                            <img src="{{ asset('storage/' . $produk->photo) }}"
                                                alt="{{ $produk->nama }}" style="max-width: 100px; height: 100px;">
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="total-harga">Total Harga</label>
                                    <input id="total-harga" type="text" class="form-control" value="0" readonly>
                                </div>

                             <div class="form-group mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="terms" name="terms" class="form-check-input">
                                    <label for="terms" class="form-check-label">
                                        Saya setuju dengan <a href="#termsSection" class="text-decoration-none text-primary">syarat dan
                                            ketentuan</a> yang berlaku.
                                    </label>
                                </div>
                                @error('terms')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong class="text-danger">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <!-- Syarat dan Ketentuan -->
                            <div id="termsSection" class="card shadow-sm mt-3" style="display:none;">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0">Syarat dan Ketentuan</h5>
                                </div>
                                <div class="card-body">
                                    <p>1. Pembayaran harus rutin, apabila 10x berturut-turut tidak bayar, barang akan ditambah.</p>
                                    <p>2. Barang yang sudah dipilih tidak boleh ditukar dengan barang lain kecuali stok barangnya kosong.</p>
                                    <p>3. Pembagian sembako diberikan 2 minggu sebelum puasa hingga 2 minggu setelah puasa.</p>
                                    <p>4. Daging sapi dibagikan pada malam tanggal 21 Ramadhan.</p>
                                    <p>Dan syarat lainnya...</p>
                                </div>
                            </div>
                            </div>

                            <!-- Modal untuk syarat dan ketentuan -->
                            <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="termsModalLabel">Syarat dan Ketentuan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>1. Pembayaran harus rutin, apabila 10x berturut-turut tidak bayar, barang akan ditambah.</p>
                                            <p>2. Barang yang sudah dipilih tidak boleh ditukar dengan barang lain kecuali stok barangnya kosong.
                                            </p>
                                            <p>3. Pembagian sembako diberikan 2 minggu sebelum puasa hingga 2 minggu setelah puasa.</p>
                                            <p>4. Daging sapi dibagikan pada malam tanggal 21 Ramadhan.</p>
                                            <p>Dan syarat lainnya...</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="text-center mt-4 d-flex justify-content-center align-items-center gap-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Register</button>
                                    <a href="{{ url()->previous() }}" class="btn btn-lg btn-secondary">Kembali</a>
                                </div>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="registerSuccessModal" tabindex="-1"
                                aria-labelledby="registerSuccessModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="registerSuccessModalLabel">Pendaftaran Berhasil
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Akun Anda sedang diperiksa oleh admin. Mohon ditunggu konfirmasi melalui
                                            nomor WA
                                            yang Anda daftarkan.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Script untuk menampilkan modal setelah berhasil register -->
                            @if (session('register_success'))
                            <script type="text/javascript">
                                window.onload = function () {
                                    var myModal = new bootstrap.Modal(document.getElementById('registerSuccessModal'));
                                    myModal.show();
                                };
                            </script>
                            @endif
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const produkCheckboxes = document.querySelectorAll('.produk-checkbox');
                                    const totalHargaInput = document.getElementById('total-harga');

                                    produkCheckboxes.forEach(checkbox => {
                                        checkbox.addEventListener('change', function () {
                                            let totalHarga = 0;
                                            produkCheckboxes.forEach(cb => {
                                                if (cb.checked) {
                                                    totalHarga += parseInt(cb.getAttribute('data-harga'));
                                                }
                                            });
                                            totalHargaInput.value = totalHarga.toLocaleString('id-ID');
                                        });
                                    });
                                });

                                document.querySelector('.toggle-password').addEventListener('click', function () {
                                    const passwordInput = document.getElementById('password');
                                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                                    passwordInput.setAttribute('type', type);
                                    this.classList.toggle('fa-eye-slash');
                                });
                            </script>
                            <script>
                                document.querySelector('form').addEventListener('submit', function (event) {
                                    const termsCheckbox = document.getElementById('terms');
                                    if (!termsCheckbox.checked) {
                                        event.preventDefault(); // Mencegah form terkirim
                                        alert('Anda harus menyetujui syarat dan ketentuan terlebih dahulu.');
                                    }
                                });
                            </script>
                            <script>
                                // Menampilkan syarat dan ketentuan saat tautan diklik
                                document.querySelector('a[href="#termsSection"]').addEventListener('click', function(event) {
                                    event.preventDefault();
                                    const termsSection = document.getElementById('termsSection');
                                    termsSection.style.display = termsSection.style.display === 'none' ? 'block' : 'none';
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>