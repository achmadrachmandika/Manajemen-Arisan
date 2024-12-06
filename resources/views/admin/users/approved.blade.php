@extends('layout.app')

@section('content')
<main class="content">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Peserta Arisan</h5>
                        <h6 class="card-subtitle text-muted">Berisi data peserta yang mengikuti arisan.</h6>
                    </div>
                    <div class="card-body">

                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nomor WA</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Produk yang Diikuti</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Aksi</th> <!-- Kolom baru untuk tombol aksi -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($approvedUsers as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->no_wa }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach($user->produk as $produk)
                                        <span class="badge bg-info">{{ $produk->nama }}</span><br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($user->produk as $produk)
                                        <span class="badge bg-info">{{ $produk->deskripsi }}</span><br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($user->produk as $produk)
                                        <span class="badge bg-success">Rp. {{ number_format($produk->harga, 0, ',', '.')
                                            }}/ Minggu</span><br>
                                        @endforeach
                                    </td>
                               
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection