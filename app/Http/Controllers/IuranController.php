<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import User model

class IuranController extends Controller
{
    // Method to handle the print page
    public function printTransaksi($userId)
    {
        // Retrieve the user by their ID and load the related produk data
        $user = User::with('produk')->findOrFail($userId); // Retrieve user with related 'produk'

        // Return the 'print' view and pass the user data
        return view('print', compact('user'));
    }
}
