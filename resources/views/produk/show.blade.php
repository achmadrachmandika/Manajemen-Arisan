@extends('layout.app')

@section('content')
<main class="content">
    <div class="container-fluid">
        
            <h1 class="h3 mb-3">Halaman Detail Produk</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Detail Produk: {{ $produk->nama }}</h5>
                    </div>
                    <div class="card-body">
                        <!-- Nama Produk -->
                        <div class="mb-3">
                            <h6 class="font-weight-bold">Nama Produk</h6>
                            <p>{{ $produk->nama }}</p>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <h6 class="font-weight-bold">Deskripsi</h6>
                            <p>{{ $produk->deskripsi }}</p>
                        </div>

                        <!-- Kategori -->
                        <div class="mb-3">
                            <h6 class="font-weight-bold">Kategori</h6>
                            <p>{{ $produk->kategori }}</p>
                        </div>

                        <!-- Tanggal -->
                        <div class="mb-3">
                            <h6 class="font-weight-bold">Tanggal</h6>
                            <p>{{ $produk->tanggal->format('d-m-Y') }}</p>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end">
                           <td>
                                    <a href="{{ route('produk.index') }}" class="btn btn-info btn-sm">Kembali</a>
                                </form>
                            </td>
                        </div>
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
                document.querySelector('form').submit();
            }
        });
    }
</script>