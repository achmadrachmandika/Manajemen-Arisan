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
{{--
pembayaran harus rutin, apabila 10x berturut turut tidak bayar, barang naik tambah >Balang yang sudah di pilih tidak
boleh di tukar dengan barang lain kecuali setok barangnya kosong >pembagian sembako di berikan 2 minggu sebelu, puasa
S/D 2 minggu setelah puasa >Daging sapi di bagikan malam 21 --}}