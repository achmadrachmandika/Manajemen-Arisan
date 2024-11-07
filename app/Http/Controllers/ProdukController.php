<?php

namespace App\Http\Controllers;

use App\Models\Produk;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        $produk = Produk::all(); // Retrieve all products
        return view('produk.index', compact('produk')); 
    }

     public function create()
    {
        return view('produk.create'); // Return a view to create a new product
    }

    /**
     * Store a newly created product in the database.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'nama' => 'required|max:50',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required|date',
        ]);

        // Create a new product record
        Produk::create($validated);

        // Redirect after storing the product
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id); // Find the product by ID
        return view('produk.show', compact('produk')); // Return to a view to display the product
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id); // Find the product by ID
        return view('produk.edit', compact('produk')); // Return to a view for editing the product
    }

    /**
     * Update the specified product in the database.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'nama' => 'required|max:50',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'tanggal' => 'required|date',
        ]);

        // Find the product by ID and update it
        $produk = Produk::findOrFail($id);
        $produk->update($validated);

        // Redirect after updating the product
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified product from the database.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id); // Find the product by ID
        $produk->delete(); // Delete the product

        // Redirect after deleting the product
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
