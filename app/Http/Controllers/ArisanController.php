<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Pastikan untuk mengimport Auth
use App\Models\Produk;

class ArisanController extends Controller
{
    public function index()
    {
        // Mengambil pengguna yang sedang login
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        $produk = Produk::all(); // Mendapatkan produk
        return view('arisan', compact('produk', 'user')); // Kirimkan ke tampilan
    }

    // Menampilkan detail iuran untuk user yang login
    public function show()
    {
        $user = Auth::user(); // Mengambil data pengguna yang sedang login
        return view('detailiuranuser', compact('user')); // Kirimkan ke tampilan
    }
}


