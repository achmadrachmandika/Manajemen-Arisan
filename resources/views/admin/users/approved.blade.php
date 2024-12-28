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

                        <div class="table-responsive">
                            <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nomor WA</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Produk yang Diikuti</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($approvedUsers as $user)
                                    <tr>
                                        <td class="wrap-content">{{ $user->name }}</td>
                                        <td class="wrap-content">{{ $user->no_wa }}</td>
                                        <td class="wrap-content">{{ $user->alamat }}</td>
                                        <td class="wrap-content">{{ $user->email }}</td>
                                        <td class="wrap-content">
                                            @foreach($user->produk as $produk)
                                            <span class="badge bg-info">{{ $produk->nama }}</span><br>
                                            @endforeach
                                        </td>
                                        <td class="text-wrap">
                                            @foreach($user->produk as $produk)
                                            <p>{{ $produk->deskripsi }}</p>
                                            @endforeach
                                        </td>
                                        <td class="wrap-content">
                                            @foreach($user->produk as $produk)
                                            <span class="badge bg-success">Rp. {{ number_format($produk->harga, 0, ',',
                                                '.') }}/ Minggu</span><br>
                                            @endforeach
                                        </td>
                                        <td class="wrap-content">
                                            <!-- Tambahkan aksi di sini -->
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

    </div>
</main>
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        $('#zero_config').DataTable({
            "paging": true,
            "ordering": true,
            "info": true
        });
    });
</script>
@endpush
<style>
    .text-wrap {
        white-space: normal !important;
    }
</style>
