<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB untuk raw query
use App\Models\User; // Pastikan model User digunakan

class JadwalPegawaiController extends Controller
{
    public function index()
    {
        // Mengambil semua pegawai beserta produk yang diikuti (pastikan relasi sudah didefinisikan di model User)
        $pegawai = User::with('produk')->get();
            // Query untuk mendapatkan total produk per produk_id
         $produkSummary = DB::table('user_produk')
            ->join('produk', 'user_produk.produk_id', '=', 'produk.produk_id')
            ->join('users', 'user_produk.user_id', '=', 'users.id')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->where('roles.name', 'peserta') // Filter hanya untuk role 'peserta'
            ->select('produk.nama AS nama_produk', 'produk.produk_id', DB::raw('COUNT(user_produk.produk_id) AS total'))
            ->groupBy('produk.produk_id', 'produk.nama')
            ->orderBy('produk.nama', 'ASC')
            ->get();


        // Mengirimkan data pegawai ke view
        return view('jadwalpegawai', compact('pegawai', 'produkSummary'));
    }
}

