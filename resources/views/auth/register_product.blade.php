<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Choose Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: #f7f9fc;
        }

        .register-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .register-card .form-label {
            font-weight: 600;
        }

        .register-card .btn-finish {
            background-color: #007bff;
            color: white;
            width: 100%;
            padding: 12px;
            border-radius: 8px;
        }

        .register-card .btn-finish:hover {
            background-color: #0056b3;
        }

        .register-card .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 150px;
        }

        .produk-checkbox label {
            display: block;
            font-size: 16px;
            padding: 8px;
            background: #f9f9f9;
            margin-bottom: 8px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .produk-checkbox input[type="checkbox"]:checked+label {
            background-color: #cce5ff;
        }

        .produk-checkbox label:hover {
            background-color: #f1f1f1;
        }

        .text-center p {
            font-size: 18px;
            color: #888;
        }

        .produk-image {
            max-width: 100px;
            height: 100px;
            margin-top: 5px;
            cursor: pointer;
        }

        .terms-checkbox {
            font-size: 14px;
        }

        #termsSection {
            display: none;
        }
    </style>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="register-card col-md-6 col-lg-4">
            <div class="logo text-center">
                <h1 class="logo-text">MEUBELADJI</h1>
            </div>

            <h3 class="text-center mb-4">Register - Choose Product</h3>

            <form action="{{ route('register.product.submit') }}" method="POST" id="register-form">
                @csrf

                <div id="produk-list" class="mb-4">
                    @foreach($produks as $produk)
                    <div class="produk-checkbox">
                        <input type="checkbox" name="produk_id[]" value="{{ $produk->produk_id }}"
                            id="produk{{ $produk->produk_id }}" data-harga="{{ $produk->harga }}">
                        <label for="produk{{ $produk->produk_id }}">
                            {{ $produk->nama }} - Rp{{ number_format($produk->harga, 0, ',', '.') }}
                        </label>
                        @if($produk->photo)
                        <img src="{{ asset('storage/' . $produk->photo) }}" alt="{{ $produk->nama }}"
                            class="produk-image" data-checkbox-id="produk{{ $produk->produk_id }}">
                        @endif
                    </div>
                    @endforeach
                </div>

                <div class="form-group mb-3">
                    <label for="total-harga">Total Harga</label>
                    <input id="total-harga" type="text" class="form-control" value="0" readonly>
                </div>

                <div class="form-group mb-3 terms-checkbox">
                    <input type="checkbox" id="showTerms" name="showTerms">
                    <label for="showTerms">Tampilkan Syarat dan Ketentuan yang berlaku</label>
                </div>

                <!-- Hidden Terms and Conditions -->
                <div id="termsSection" class="card shadow-sm mt-3">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Syarat dan Ketentuan</h5>
                    </div>
                    <div class="card-body">
                        <p>1. Pembayaran harus rutin, apabila 10x berturut-turut tidak bayar, barang akan ditambah.</p>
                        <p>2. Barang yang sudah dipilih tidak boleh ditukar dengan barang lain kecuali stok barangnya
                            kosong.</p>
                        <p>3. Pembagian sembako diberikan 2 minggu sebelum puasa hingga 2 minggu setelah puasa.</p>
                        <p>4. Daging sapi dibagikan pada malam tanggal 21 Ramadhan.</p>
                        <p>Dan syarat lainnya...</p>
                    </div>
                </div>

                <div class="form-group mb-3 terms-checkbox">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Saya setuju dengan peraturan tersebut <a href="javascript:void(0)"
                            id="view-terms">terms and
                            conditions</a>.</label>
                </div>

                <button type="submit" class="btn-finish">Kirim</button>
            </form>
        </div>
    </div>

    <!-- Modal for Registration Success -->
    <div class="modal fade" id="registerSuccessModal" tabindex="-1" aria-labelledby="registerSuccessModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerSuccessModalLabel">Pendaftaran Berhasil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Akun Anda sedang diperiksa oleh admin. Mohon ditunggu konfirmasi melalui nomor WA yang Anda
                    daftarkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const produkCheckboxes = document.querySelectorAll('.produk-checkbox input[type="checkbox"]');
            const totalHargaInput = document.getElementById('total-harga');
            const termsCheckbox = document.getElementById('terms');
            const termsSection = document.getElementById('termsSection');
            const showTermsCheckbox = document.getElementById('showTerms');
            const registerForm = document.getElementById('register-form');
            
            // Show or hide terms section when checkbox is clicked
            showTermsCheckbox.addEventListener('change', function () {
                if (this.checked) {
                    termsSection.style.display = 'block';
                } else {
                    termsSection.style.display = 'none';
                }
            });

            // Update total price on checkbox change
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

            // Toggle checkbox when product image is clicked
            const produkImages = document.querySelectorAll('.produk-image');
            produkImages.forEach(image => {
                image.addEventListener('click', function () {
                    const checkboxId = image.getAttribute('data-checkbox-id');
                    const checkbox = document.getElementById(checkboxId);
                    checkbox.checked = !checkbox.checked;  // Toggle checkbox state
                    checkbox.dispatchEvent(new Event('change'));  // Trigger change event to update total price
                });
            });

            // Form submission validation
            registerForm.addEventListener('submit', function (event) {
                if (!termsCheckbox.checked) {
                    event.preventDefault();
                    alert('You must agree to the terms and conditions before submitting the form.');
                }
            });
        });
    </script>

</body>

</html>