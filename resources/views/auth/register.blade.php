@extends('layouts.app')

@section('content')
@if (session('register_success'))
<div class="alert alert-success">
    {{ session('register_success') }}
</div>
@endif
<div class="container">
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                autocomplete="new-password">
        </div>

        <div class="form-group">
            <label for="produk">Pilih Produk</label>
            <div id="produk-list">
                @foreach($produks as $produk)
                <div class="form-check">
                    <input class="form-check-input produk-checkbox" type="checkbox" name="produk_id[]"
                        value="{{ $produk->produk_id }}" id="produk{{ $produk->produk_id }}" data-harga="{{ $produk->harga }},">
                    <label class="form-check-label" for="produk{{ $produk->produk_id }}">
                        {{ $produk->nama }} - Rp{{ number_format($produk->harga, 0, ',', '.') }}
                    </label>
                    @if($produk->photo)
                    <img src="{{ asset('storage/' . $produk->photo) }}" alt="{{ $produk->nama }}" style="max-width: 100px; height: 100px;">
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label for="total-harga">Total Harga</label>
            <input id="total-harga" type="text" class="form-control" value="0" readonly>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="registerSuccessModal" tabindex="-1" aria-labelledby="registerSuccessModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerSuccessModalLabel">Pendaftaran Berhasil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Akun Anda sedang diperiksa oleh admin. Mohon ditunggu konfirmasi melalui nomor WA yang Anda daftarkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk menampilkan modal setelah berhasil register -->
@if (session('register_success'))
<script type="text/javascript">
    // Menunggu modal tampil setelah halaman selesai dimuat
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
@endsection