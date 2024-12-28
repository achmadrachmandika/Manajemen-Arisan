@extends('layout.app')

@section('content')
<main class="content">
    <div class="container">
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Daftar Produk Arisan</h5>
                            <h6 class="card-subtitle text-muted">Berisi data produk yang dapat digunakan untuk arisan.
                            </h6>
                        </div>
                        <div class="card-body">
                            <a type="button" href="{{ route('produk.create') }}"
                                class="btn btn-success rounded-5 mb-3">Tambah Data</a>
                            <div class="table-responsive">
                                <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Produk</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($produk as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td class="text-wrap">{{ $item->deskripsi }}</td>
                                            <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td>{{ $item->kategori }}</td>
                                            <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                                            <td>
                                                @if($item->photo)
                                                <img src="{{ asset('storage/' . $item->photo) }}"
                                                    alt="{{ $item->nama }}" style="max-width: 100px; height: 100px;">
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('produk.show', $item->produk_id) }}"
                                                    class="btn btn-info btn-sm">Detail</a>
                                                <a href="{{ route('produk.edit', $item->produk_id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <form id="deleteForm-{{ $item->produk_id }}"
                                                    action="{{ route('produk.destroy', $item->produk_id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="confirmDelete('{{ $item->nama }}', '{{ $item->produk_id }}')">Hapus</button>
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
        </section>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(productName, formId) {
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
                document.getElementById('deleteForm-' + formId).submit();
            }
        });
    }
</script>

<style>
    .text-wrap {
        white-space: normal !important;
    }
</style>