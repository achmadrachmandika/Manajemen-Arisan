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

            <form action="{{ route('admin.users.approve', $user->id) }}" method="POST">
                @csrf
                <label for="role">Pilih Role:</label>
                <select name="role" id="role">
                    <option value="admin">Admin</option>
                    <option value="peserta">Peserta</option>
                </select>
                <button type="submit">Approve</button>
            </form>
            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" id="delete-form-{{ $user->id }}"
                style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $user->id }})">Hapus</button>
            </form>
        </div>

        <!-- Button Delete -->
       
    </div>
    @endif
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Apa anda yakin ingin menghapus peserta ini?',
            // text: 'You will not be able to recover this record!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Trigger the form submission after confirmation
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }
</script>
@endsection