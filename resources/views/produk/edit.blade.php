@extends('layout.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Form Edit Produk</h5>
                        <h6 class="card-subtitle text-muted">Ubah informasi produk yang telah ada.</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('produk.update', $produk->produk_id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama Produk -->
                            <div class="form-group">
                                <label for="nama">Nama Produk</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" value="{{ old('nama', $produk->nama) }}" required>
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                    name="deskripsi" rows="3"
                                    required>{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                                @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <textarea class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" rows="3"
                                    required>{{ old('harga', $produk->harga) }}</textarea>
                                @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kategori -->
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Sembako" {{ old('kategori', $produk->kategori) == 'Sembako' ? 'selected' : '' }}>Sembako</option>
                                    <option value="Minuman" {{ old('kategori', $produk->kategori) == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                                    <option value="Kue/Jajan" {{ old('kategori', $produk->kategori) == 'Kue/Jajan' ? 'selected' : '' }}>Kue/Jajan
                                    </option>
                                    <option value="Paket Kue" {{ old('kategori', $produk->kategori) == 'Paket Kue' ? 'selected' : '' }}>Paket Kue
                                    </option>
                                    <option value="Paket Snack" {{ old('kategori', $produk->kategori) == 'Paket Snack' ? 'selected' : '' }}>Paket
                                        Snack</option>
                                    <option value="Tabungan" {{ old('kategori', $produk->kategori) == 'Tabungan' ? 'selected' : '' }}>Tabungan
                                    </option>
                                    <option value="Mebel" {{ old('kategori', $produk->kategori) == 'Mebel' ? 'selected' : '' }}>Mebel</option>
                                </select>
                                @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="photo" class="form-label"><strong>Photo:</strong></label>
                                <input type="file" id="photo" name="photo" class="form-control">
                                @if($produk->photo)
                                <img src="{{ asset('storage/' . $produk->photo) }}" alt="Current Photo"
                                    style="max-width: 150px; height: auto; margin-top: 10px;">
                                @endif
                                @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tanggal -->
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal" name="tanggal"
                                    value="{{ old('tanggal', $produk->tanggal->format('Y-m-d')) }}" required>
                                @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection