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

        .produk-image {
            max-width: 100px;
            height: 100px;
            margin-top: 5px;
            cursor: pointer;
        }

        .terms-checkbox {
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="register-card col-md-6 col-lg-4">
            <h3 class="text-center mb-4">Pilih produk yang akan diikuti</h3>

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

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#termsModal">
                    Baca Syarat dan Ketentuan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h5 class="modal-title" id="termsModalLabel">Syarat dan Ketentuan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>1. Pembayaran harus rutin, apabila 10x berturut-turut tidak bayar, barang akan
                                    ditambah.</p>
                                <p>2. Barang yang sudah dipilih tidak boleh ditukar dengan barang lain kecuali stok
                                    barangnya kosong.</p>
                                <p>3. Pembagian sembako diberikan 2 minggu sebelum puasa hingga 2 minggu setelah puasa.
                                </p>
                                <p>4. Daging sapi dibagikan pada malam tanggal 21 Ramadhan.</p>
                                <p>Dan syarat lainnya...</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3 terms-checkbox">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Saya setuju dengan syarat dan ketentuan.</label>
                </div>

                <button type="submit" class="btn-finish">Kirim</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const produkCheckboxes = document.querySelectorAll('.produk-checkbox input[type="checkbox"]');
            const totalHargaInput = document.getElementById('total-harga');

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
                    checkbox.checked = !checkbox.checked;
                    checkbox.dispatchEvent(new Event('change'));
                });
            });
        });
    </script>
</body>

</html>