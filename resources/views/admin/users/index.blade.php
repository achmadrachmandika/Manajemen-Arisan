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
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection