<?php

namespace App\Http\Controllers;

use App\Models\Produk;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
   public function index(Request $request)
{
    $produk = Produk::all(); // Ambil semua data produk dari database

    // Kirimkan data produk ke view
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
        'kategori' => 'required|in:Sembako,Minuman,Kue/Jajan,Paket Kue,Paket Snack,Tabungan dan Mebel',
        'harga' => 'required',
        'photo' => 'nullable|image|file|max:2048',
        'tanggal' => 'required|date',
    ]);

    // Handle file upload
    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('photos', 'public');
    }

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
    // Validasi data yang masuk
    $validated = $request->validate([
        'nama' => 'required|max:50',
        'deskripsi' => 'required',
        'harga' => 'required|numeric|min:0', // Validasi harga sebagai angka
        'kategori' => 'required|in:Sembako,Minuman,Kue/Jajan,Paket Kue,Paket Snack,Tabungan,Mebel',
        'photo' => 'nullable|image|file|max:2048',
        'tanggal' => 'required|date',
    ]);

    // Temukan produk berdasarkan ID
    $produk = Produk::findOrFail($id);

    // Tangani unggahan file foto
    if ($request->hasFile('photo')) {
        // Hapus foto lama jika ada
        if ($produk->photo) {
            \Storage::disk('public')->delete($produk->photo);
        }
        // Simpan foto baru
        $validated['photo'] = $request->file('photo')->store('photos', 'public');
    } else {
        // Jangan perbarui field photo jika tidak ada file baru yang diunggah
        unset($validated['photo']);
    }

    // Perbarui produk
    $produk->update($validated);

    // Redirect setelah memperbarui produk
    return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui!');
}

    /**
     * Remove the specified product from the database.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id); // Find the product by ID
        $produk->delete(); // Delete the product
         if ($produk->photo) {
            Storage::disk('public')->delete($produk->photo);
        }


        // Redirect after deleting the product
        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}
