@extends('layout.app')

@section('content')
<div class="container">
    <h1>Persetujuan Anggota Arisan</h1>

    @foreach($users as $user)
    @if(!$user->is_approved)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }} ({{ $user->email }})</h5>
            <h6>Alamat: {{ $user->alamat }}</h6>
            <h6>Nomor WA: {{ $user->no_wa }}</h6>

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

            <form action="{{ route('admin.users.approve', $user->id) }}" method="POST"
                onsubmit="return approveUser(event, '{{ $user->no_wa }}', '{{ $user->produk->pluck('nama')->implode(', ') }}')">
                @csrf
                <label for="role">Pilih Role:</label>
                <select name="role" id="role">
                    <option value="pegawai">Pegawai</option>
                    <option value="peserta">Peserta</option>
                </select>
                <button type="submit">Approve</button>
            </form>
            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" id="delete-form-{{ $user->id }}"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-sm"
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
                // Trigger the form submission after confirmation
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }

    function approveUser(event, phoneNumber, productName) {
        event.preventDefault();
        var form = event.target;
        var whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent('Selamat anda telah melakukan pembayaran pada ' + productName + ' dan anda dapat melakukan login dengan akun yang telah didaftarkan sebelumnya.')}`;
        
        Swal.fire({
            title: 'Approve anggota ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Approve!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                setTimeout(function() {
                    window.location.href = whatsappUrl;
                }, 1000);
            }
        });
    }
</script>
@endsection