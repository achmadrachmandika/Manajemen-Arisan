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
            margin: 0;
            padding: 0;
        }

        .register-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            overflow-y: auto;
            max-height: 90vh;
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

        /* Agar seluruh kartu produk memiliki tinggi yang sama */
        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-body {
            flex-grow: 1;
        }

        .produk-image {
            max-height: 150px;
            object-fit: cover;
        }

        .card-title {
            font-size: 16px;
            font-weight: bold;
        }

        .card-text {
            font-size: 14px;
        }

        /* Mengatur responsivitas kolom produk */
        @media (max-width: 768px) {
            .produk-image {
                max-width: 80px;
            }
        }

        @media (max-width: 576px) {
            .produk-image {
                max-width: 60px;
            }
        }
    </style>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="register-card col-md-8 col-lg-6">
            <h3 class="text-center mb-4">Pilih produk yang akan diikuti</h3>

            <form action="{{ route('register.product.submit') }}" method="POST" id="register-form">
                @csrf

                <div id="produk-list" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 mb-4">
                    @foreach($produks as $produk)
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-flex flex-column align-items-center">
                                <!-- Checkbox -->
                                <input type="checkbox" name="produk_id[]" value="{{ $produk->produk_id }}"
                                    id="produk{{ $produk->produk_id }}" data-harga="{{ $produk->harga }}"
                                    class="produk-checkbox mb-3">

                                <!-- Gambar Produk -->
                                @if($produk->photo)
                                <img src="{{ asset('storage/' . $produk->photo) }}" alt="{{ $produk->nama }}"
                                    class="produk-image img-fluid mb-3" style="max-height: 150px; object-fit: cover;">
                                @endif

                                <!-- Nama dan Harga Produk -->
                                <h5 class="card-title text-center">{{ $produk->nama }}</h5>
                                <p class="card-text text-center">Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>

                                <!-- Quantity -->
                                <label for="quantity{{ $produk->produk_id }}">Quantity</label>
                                <input type="number" id="quantity{{ $produk->produk_id }}"
                                    name="quantity[{{ $produk->produk_id }}]" value="1" min="1"
                                    class="form-control mb-3 quantity-input" data-harga="{{ $produk->harga }}">

                            </div>
                        </div>
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
                                <p>1. Pembayaran harus rutin...</p>
                                <p>2. Barang yang sudah dipilih...</p>
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

                <button type="submit" id="submit-btn" class="btn-finish" disabled>Kirim</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const produkCheckboxes = document.querySelectorAll('.produk-checkbox');
            const quantityInputs = document.querySelectorAll('.quantity-input');
            const totalHargaInput = document.getElementById('total-harga');
            const submitBtn = document.getElementById('submit-btn');
            const termsCheckbox = document.getElementById('terms');

            function updateTotalHarga() {
                let totalHarga = 0;
                produkCheckboxes.forEach(cb => {
                    if (cb.checked) {
                        const productId = cb.value;
                        const quantityInput = document.getElementById('quantity' + productId);
                        const harga = parseInt(cb.getAttribute('data-harga'));
                        const quantity = parseInt(quantityInput.value);
                        totalHarga += harga * quantity;
                    }
                });
                totalHargaInput.value = totalHarga.toLocaleString('id-ID');
                checkFormValidity();
            }

            produkCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    updateTotalHarga();
                });
            });

            quantityInputs.forEach(input => {
                input.addEventListener('input', function () {
                    updateTotalHarga();
                });
            });

            termsCheckbox.addEventListener('change', checkFormValidity);

            function checkFormValidity() {
                const atLeastOneProductChecked = Array.from(produkCheckboxes).some(checkbox => checkbox.checked);
                if (atLeastOneProductChecked && termsCheckbox.checked) {
                    submitBtn.disabled = false;
                } else {
                    submitBtn.disabled = true;
                }
            }

            // Toggle checkbox and update total price when clicking on image or label
            const produkImages = document.querySelectorAll('.produk-image');
            const produkLabels = document.querySelectorAll('.produk-checkbox label');

            function toggleCheckboxByCard(cardId) {
                const checkbox = document.getElementById(cardId);
                checkbox.checked = !checkbox.checked;
                checkbox.dispatchEvent(new Event('change'));
            }

            produkImages.forEach(image => {
                image.addEventListener('click', function () {
                    const checkboxId = image.getAttribute('id');
                    toggleCheckboxByCard(checkboxId);
                });
            });

            produkLabels.forEach(label => {
                label.addEventListener('click', function () {
                    const checkbox = label.previousElementSibling;
                    checkbox.checked = !checkbox.checked;
                    checkbox.dispatchEvent(new Event('change'));
                });
            });

            // Initial calculation on page load
            updateTotalHarga();
        });
    </script>
</body>

</html>