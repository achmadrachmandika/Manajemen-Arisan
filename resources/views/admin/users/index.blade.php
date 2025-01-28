@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Persetujuan Anggota Arisan</h1>

    @foreach($users as $user)
    @if(!$user->is_approved)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }} ({{ $user->email }})</h5>
            <h6 class="card-subtitle mb-2 text-muted">Alamat: {{ $user->alamat }}</h6>
            <h6 class="card-subtitle mb-2 text-muted">Nomor WA: {{ $user->no_wa }}</h6>

            <h6>Produk yang Dipilih:</h6>
            <ul>
                @foreach($user->produk as $produk)
                <li>
                    {{ $produk->nama }} -
                    @if(isset($produk->pivot->quantity))
                    Rp{{ number_format($produk->harga * $produk->pivot->quantity, 0, ',', '.') }} ({{
                    $produk->pivot->quantity }} x Rp{{ number_format($produk->harga, 0, ',', '.') }})
                    @else
                    Rp{{ number_format($produk->harga, 0, ',', '.') }}
                    @endif
                </li>
                @endforeach
            </ul>

            <h6>Total Harga:</h6>
            <p>
                Rp{{ number_format($user->produk->sum(function($produk) {
                return $produk->harga * $produk->pivot->quantity;
                }), 0, ',', '.') }}
            </p>

            <form action="{{ route('admin.users.approve', $user->id) }}" method="POST" class="d-inline"
                onsubmit="return approveUser(event, '{{ $user->no_wa }}', '{{ $user->produk->pluck('nama')->implode(', ') }}')">
                @csrf
                <div class="form-group">
                    <label for="role">Pilih Role:</label>
                    <select name="role" id="role" class="form-control">
                        <option value="pegawai">Pegawai</option>
                        <option value="peserta">Peserta</option>
                    </select>
                </div>

                <!-- Input untuk Jumlah Bagian Iuran -->
                <div class="mb-3">
                    <label for="jumlah_bagian" class="form-label">Jumlah Bagian</label>
                    <input type="number" id="jumlah_bagian" name="jumlah_bagian" class="form-control" min="1" value="1" required>
                </div>

                <!-- Dynamic Fields for Iuran per Bagian -->
                <div class="mb-3">
                    <label for="iuran" class="form-label">Iuran</label>
                    <!-- Tambahkan input untuk iuran setiap produk -->
                    @foreach($user->produk as $produk)
                    <div>
                        <label>{{ $produk->nama }}</label>
                        <input type="hidden" name="iuran[{{ $produk->id }}][1]" value="belum_terbayar"> <!-- Contoh untuk bagian 1 -->
                    </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary mt-2">Approve</button>
            </form>

            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" id="delete-form-{{ $user->id }}"
                class="d-inline">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger mt-2"
                    onclick="confirmDelete({{ $user->id }})">Hapus</button>
            </form>
        </div>
    </div>
    @endif
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Handle the dynamic input fields for iuran
    document.getElementById('jumlah_bagian').addEventListener('input', function() {
        var jumlahBagian = this.value; // Dapatkan jumlah bagian dari input
        // Untuk setiap produk, buat input bagian dinamis
        @foreach($user->produk as $produk)
            var bagianFields = document.getElementById('bagian_fields_{{ $produk->id }}');
            bagianFields.innerHTML = ''; // Reset bagian sebelumnya
            for (var i = 1; i <= jumlahBagian; i++) {
                // Buat input untuk setiap bagian
                var div = document.createElement('div');
                div.classList.add('form-check');
                div.innerHTML = `
                    <input type="checkbox" class="form-check-input" name="iuran[{{ $produk->id }}][${i}]" value="terbayar" id="iuran_{{ $produk->id }}_${i}">
                    <label class="form-check-label" for="iuran_{{ $produk->id }}_${i}">Bagian ${i}</label>
                `;
                bagianFields.appendChild(div);
            }
        @endforeach
    });

    // Trigger input untuk bagian pertama kali
    document.getElementById('jumlah_bagian').dispatchEvent(new Event('input'));

    // Function for confirming deletion
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Apa anda yakin ingin menghapus peserta ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Hapus peserta ini!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }

    // Function to handle user approval
    function approveUser(event, no_wa, productName) {
        event.preventDefault(); // Mencegah form langsung submit
        var form = event.target;

        // Pesan WhatsApp
        var whatsappMessage = `Selamat, Anda telah melakukan pembayaran pada produk: ${productName}. Silakan login dengan akun yang telah didaftarkan.`;
        var whatsappUrl = `https://wa.me/${no_wa}?text=${encodeURIComponent(whatsappMessage)}`;

        // Konfirmasi dengan SweetAlert
        Swal.fire({
            title: 'Approve anggota ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Approve!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit form untuk persetujuan
                setTimeout(function() {
                    window.location.href = whatsappUrl; // Membuka WhatsApp di tab yang sama
                }, 1000);
            }
        });
    }
</script>
@endsection