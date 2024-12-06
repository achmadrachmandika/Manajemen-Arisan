<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Import the Produk model
use App\Models\User; // Import the Produk model

class ArisanController extends Controller
{
       public function index()
    {
        $produk = Produk::all(); // Retrieve all products
        $user = User::all(); // Retrieve all products
        return view('arisan', compact('produk', 'user')); // Pass products to the view
    }
}
