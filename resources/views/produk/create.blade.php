@extends('layout.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Form Tambah Produk Arisan</h5>
                        <h6 class="card-subtitle text-muted">Anda dapat menambah Daftar Produk Arisan di form ini</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Harga Per Iuran</label>
                                <input type="number" name="harga" class="form-control" placeholder="Harga" required min="0" step="0.01">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select name="kategori" class="form-control" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Sembako">Sembako</option>
                                    <option value="Minuman">Minuman</option>
                                    <option value="Kue/Jajan">Kue/Jajan</option>
                                    <option value="Paket Kue">Paket Kue</option>
                                    <option value="Paket Snack">Paket Snack</option>
                                    <option value="Tabungan">Tabungan</option>
                                    <option value="Mebel">Mebel</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pilih Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>

                            <div class="mt-3 text-center">
                                <button type="submit" class="btn btn-primary rounded-5">Submit</button>
                                <a class="btn btn-warning rounded-5" href="{{ route('produk.index') }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection