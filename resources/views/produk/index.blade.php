@extends('layout.app')

@section('content')
<main class="content">
    <div class="container">

        <h1 class="h3 my-3">Halaman Data Produk</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Produk Arisan</h5>
                        <h6 class="card-subtitle text-muted">Berisi data produk yang dapat digunakan untuk arisan.</h6>
                    </div>
                    <div class="card-body">
                        <a type="button" href="{{ route('produk.create') }}"
                            class="btn btn-success rounded-5 mb-3">Tambah Data</a>

                        <table id="datatables-reponsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($produk as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('produk.show', $item->id) }}"
                                            class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('produk.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form id="deleteForm" action="{{ route('produk.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="confirmDelete('{{ $item->nama }}')">Hapus</button>
                                        </form>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(productName) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menghapus produk " + productName + "!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika konfirmasi 'Ya'
                document.getElementById('deleteForm').submit();
            }
        });
    }
</script>

