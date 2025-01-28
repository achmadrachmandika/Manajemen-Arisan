<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login'; // Redirect to login page after registration

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Show identity registration form
    public function showIdentityForm()
    {
        return view('auth.register_identity');
    }

    // Handle identity submission
    public function submitIdentity(Request $request)
    {
        // Validate the identity data
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:users'],
            'alamat' => ['required', 'string', 'max:100'],
            'no_wa' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Store identity data in session
        session([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_wa' => $request->no_wa,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('register.product');
    }

    // Show product selection form
    public function showProductForm()
    {
        $produks = Produk::all(); // Retrieve all products
        return view('auth.register_product', compact('produks'));
    }

    // Handle product selection and complete registration
  public function submitProduct(Request $request)
{
    // Validasi produk dan quantity
    $request->validate([
        'produk_id' => ['required', 'array', 'min:1'],
        'produk_id.*' => ['exists:produk,produk_id'], // Pastikan produk_id yang ada adalah valid
        'quantity' => ['required', 'array', 'min:1'],
        'quantity.*' => ['integer', 'min:1'], // Pastikan quantity valid
        'terms' => ['required', 'accepted'],
    ]);

    // Retrieve identity data from session
    $identityData = session()->only(['name', 'alamat', 'no_wa', 'email']);
    // Retrieve password from session
    $password = session('password');

    // Create a new user with the identity data and hashed password
    $user = User::create([
        'name' => $identityData['name'],
        'alamat' => $identityData['alamat'],
        'no_wa' => $identityData['no_wa'],
        'email' => $identityData['email'],
        'password' => Hash::make($password), // Store the hashed password
        'is_approved' => false, // Default to not approved
        'terms' => 'accepted', // Terms acceptance
    ]);

    $totalHarga = 0; // Variable untuk menyimpan total harga

    // Proses penyimpanan produk dengan quantity
    foreach ($request->produk_id as $produkId) {
        // Ambil quantity untuk produk tersebut
        $quantity = $request->quantity[$produkId] ?? 1; // Dapatkan quantity berdasarkan produk_id

        // Pastikan quantity lebih dari 0 sebelum menyimpannya
        if ($quantity > 0) {
            $produk = Produk::find($produkId);
            $harga = $produk->harga;
            $totalHargaPerProduk = $harga * $quantity;

            // Tambahkan produk ke pengguna (many-to-many relation) dengan quantity
            $user->produk()->attach($produkId, [
                'quantity' => $quantity,
                'total_harga' => $totalHargaPerProduk // Menyimpan total harga per produk
            ]);

            // Tambahkan total harga produk ke total harga keseluruhan
            $totalHarga += $totalHargaPerProduk;
        }
    }

    // Menyimpan total harga ke kolom total_harga pada user jika perlu
    $user->update(['total_harga' => $totalHarga]);

    // Clear session data after successful registration
    session()->flush();

    // Flash a success message to the session
    session()->flash('status', 'Pendaftaran berhasil. Silakan login.');

    // Redirect to the login page
    return redirect()->route('login')->with('status', 'Pendaftaran berhasil. Silakan login.');
}



}
