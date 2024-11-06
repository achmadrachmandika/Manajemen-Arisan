@extends('layout.app')

@section('title', 'Halaman Data Anak')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
<style>
    .rounded-5 {
        border-radius: 5px;
    }
</style>
@endsection

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Halaman Data Anak</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Anak Panti</h5>
                        <h6 class="card-subtitle text-muted">Berisi data anak baru yang akan ditambahkan kedalam sistem.
                        </h6>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-success rounded-5 mb-3">Tambah
                            Data</a>
                        <table id="datatables-responsive" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>BirthDate</th>
                                    <th>Gender</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data rows go here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatables-responsive').DataTable({
            responsive: true
        });
    });
</script>
@endsection