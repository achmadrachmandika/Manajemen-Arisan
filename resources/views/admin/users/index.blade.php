@extends('layout.app')

@section('content')
<div class="container">
    <h1>Users Pending Approval</h1>

    @foreach($users as $user)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $user->name }} ({{ $user->email }})</h5>

            <h6>Produk yang Dipilih:</h6>
            <ul>
                @foreach($user->produk as $produk)
                <li>
                    {{ $produk->nama }} - Rp{{ number_format($produk->harga, 0, ',', '.') }}
                </li>
                @endforeach
            </ul>

            <h6>Total Harga:</h6>
            <p>
                Rp{{ number_format($user->produk->sum('harga'), 0, ',', '.') }}
            </p>

            <form action="{{ route('admin.users.approved', $user->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="role">Assign Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="peserta">Peserta</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Approve</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection