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
                                        <th>Harga per Bagian</th>
                                        <th>Status Pembayaran</th>
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
                                            @foreach($user->produk as $produk)
                                            <span class="badge bg-info">
                                                Rp. {{ number_format($produk->harga / 11, 0, ',', '.') }}
                                            </span><br>
                                            @endforeach
                                        </td>
                                        <td class="wrap-content">
                                            @foreach($user->produk as $produk)
                                            @for ($i = 1; $i <= 11; $i++) <span class="badge bg-{{ $produk->{" status_bagian_$i"}=='terbayar' ? 'success'
                                                : 'danger' }}">
                                                Bagian {{ $i }}: {{ ucfirst($produk->{"status_bagian_$i"}) }}
                                                </span><br>
                                                @endfor
                                                @endforeach
                                        </td>
                                        <td class="wrap-content">
                                            <button class="btn btn-primary btn-sm"
                                                onclick="showPaymentModal({{ $user->id }}, '{{ $user->name }}')">
                                                Update Status
                                            </button>
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

<!-- Modal untuk Pembaruan Status -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Update Status Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="paymentForm" action="{{ route('admin.update.payment.status') }}" method="POST">
                    @csrf
                    <input type="hidden" id="userId" name="user_id">
                    <div class="mb-3">
                        <label for="bagian" class="form-label">Pilih Bagian</label>
                        <select id="bagian" name="bagian" class="form-select">
                            @for ($i = 1; $i <= 11; $i++) <option value="{{ $i }}">Bagian {{ $i }}</option>
                                @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Pembayaran</label>
                        <select id="status" name="status" class="form-select">
                            <option value="terbayar">Terbayar</option>
                            <option value="belum_terbayar">Belum Terbayar</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</div>

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

    function showPaymentModal(userId, userName) {
        // Set the userId in the hidden input field
        document.getElementById('userId').value = userId;
        // Set the title of the modal
        document.getElementById('paymentModalLabel').innerText = 'Update Pembayaran untuk ' + userName;
        // Show the modal
        $('#paymentModal').modal('show');
    }
</script>
@endpush

<style>
    .text-wrap {
        white-space: normal !important;
    }
</style>