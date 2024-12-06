<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Import the Produk model
use App\Models\User; // Import the Produk model
use App\Models\Role;

class DashboardController extends Controller
{
    public function index(){
    $produkCount = Produk::count(); // Retrieve all products
    $pesertaCount = User::whereHas('role', function ($query) {
            $query->where('name', 'peserta');
        })->count();
        return view ('dashboard', compact('produkCount', 'pesertaCount'));
    }
}
