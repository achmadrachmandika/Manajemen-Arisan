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
                                        <th>Nomor</th>
                                        <th>Nama Peserta</th>
                                        <th>Iuran</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Tanggal</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($peserta as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->iuran }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td>{{ $item->tanggal->format('d-m-Y') }}</td>
                                        <td>
                                            @if($item->photo)
                                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->nama }}"
                                                style="max-width: 100px; height: 100px;">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('peserta.show', $item->id) }}"
                                                class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('peserta.edit', $item->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form id="deleteForm-{{ $item->id }}"
                                                action="{{ route('peserta.destroy', $item->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete('{{ $item->nama }}', '{{ $item->id }}')">Hapus</button>
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
    </div>
</main>
@endsection

@push('scripts')
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

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