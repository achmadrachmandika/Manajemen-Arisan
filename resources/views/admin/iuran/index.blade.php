@extends('layout.app')

@section('content')
<div class="container">
    <h1>Konfirmasi Iuran</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Produk</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
           @foreach($iurans as $iuran)
        <tr>
            <td>{{ $iuran->userProduk->user->name }}</td>
            <td>{{ $iuran->userProduk->produk->nama }}</td>
            <td>{{ $iuran->is_paid ? 'Sudah Dibayar' : 'Belum Dibayar' }}</td>
            <td>
                @if(!$iuran->is_paid)
                <form action="{{ route('admin.iuran.confirm', $iuran->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                </form>
                @else
                <button class="btn btn-secondary btn-sm" disabled>Sudah Dibayar</button>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection