<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/assets/css/style.css') }}">
    <title>Arisan-Register - Pilih Produk</title>
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
                    <form method="POST" action="{{ route('register.step2') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="produk">Pilih Produk</label>
                            <div id="produk-list">
                                @foreach($produks as $produk)
                                <div class="form-check">
                                    <input class="form-check-input produk-checkbox" type="checkbox" name="produk_id[]"
                                        value="{{ $produk->produk_id }}" id="produk{{ $produk->produk_id }}"
                                        data-harga="{{ $produk->harga }}">
                                    <label class="form-check-label" for="produk{{ $produk->produk_id }}">
                                        {{ $produk->nama }} - Rp{{ number_format($produk->harga, 0, ',', '.') }}
                                    </label>
                                    @if($produk->photo)
                                    <img src="{{ asset('storage/' . $produk->photo) }}" alt="{{ $produk->nama }}"
                                        style="max-width: 100px; height: 100px;">
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="total-harga">Total Harga</label>
                            <input id="total-harga" type="text" class="form-control" value="0" readonly>
                        </div>

                        <div class="text-center mt-4 d-flex justify-content-center align-items-center gap-3">
                            <button type="submit" class="btn btn-lg btn-primary">Register</button>
                            <a href="{{ url()->previous() }}" class="btn btn-lg btn-secondary">Kembali</a>
                        </div>
                    </form>

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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

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
                    </script>
                </div>
            </div>
        </div>
    </section>
</body>

</html>