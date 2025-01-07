@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Persetujuan Anggota Arisan</h1>

    @foreach($users as $user)
    @if(!$user->is_approved)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }} ({{ $user->email }})</h5>
            <h6 class="card-subtitle mb-2 text-muted">Alamat: {{ $user->alamat }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Nomor WA: {{ $user->no_wa }}</h6>

            <h6>Produk yang Dipilih:</h6>
            <ul>
                @foreach($user->produk as $produk)
                <li>
                    {{ $produk->nama }} - Rp{{ number_format($produk->harga, 0, ',', '.') }}
                </li>
                @endforeach
            </ul>

            <h6>Total Harga:</h6>
            <p>
                Rp{{ number_format($user->produk->sum('harga'), 0, ',', '.') }}
            </p>

            <form action="{{ route('admin.users.approve', $user->id) }}" method="POST" class="d-inline"
                onsubmit="return approveUser(event, '{{ $user->no_wa }}', '{{ $user->produk->pluck('nama')->implode(', ') }}')">
                @csrf
                <div class="form-group">
                    <label for="role">Pilih Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="pegawai">Pegawai</option>
                        <option value="peserta">Peserta</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Approve</button>
            </form>

            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" id="delete-form-{{ $user->id }}"
                class="d-inline">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger mt-2"
                    onclick="confirmDelete({{ $user->id }})">Hapus</button>
            </form>
        </div>
    </div>
    @endif
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Apa anda yakin ingin menghapus peserta ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus peserta ini!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }

    function approveUser(event, no_wa, productName) {
        event.preventDefault(); // Mencegah form langsung submit
        var form = event.target;

        // Pesan WhatsApp
        var whatsappMessage = `Selamat, Anda telah melakukan pembayaran pada produk: ${productName}. Silakan login dengan akun yang telah didaftarkan.`;
        var whatsappUrl = `https://wa.me/${no_wa}?text=${encodeURIComponent(whatsappMessage)}`;

        // Konfirmasi dengan SweetAlert
        Swal.fire({
            title: 'Approve anggota ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Approve!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit form untuk persetujuan
                setTimeout(function() {
                    window.location.href = whatsappUrl; // Membuka WhatsApp di tab yang sama
                }, 1000);
            }
        });
    }
</script>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#zero_config').DataTable();
    });
</script>
@endpush

@endsection