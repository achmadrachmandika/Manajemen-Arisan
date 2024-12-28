@extends('layout.app')

@section('content')
<main class="content">
    <div class="container">
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="mb-0">Zero Configuration</h5>
                            </div>
                            <p class="card-subtitle mb-3">
                                DataTables has most features enabled by default, so all
                                you need to do to use it with your own tables is to call
                                the construction function:<code> $().DataTable();</code>.
                                You can refer full documentation from here
                                <a href="https://datatables.net/">Datatables</a>
                            </p>
                            <div class="table-responsive">
                                <table id="zero_config" class="table border table-striped table-bordered text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <!-- Add more rows as needed -->
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
        $('#zero_config').DataTable();
    });
</script>
@endpush