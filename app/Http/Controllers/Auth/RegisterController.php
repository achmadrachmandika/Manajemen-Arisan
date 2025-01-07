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

    protected $redirectTo = '/login'; // Mengarahkan ke halaman login

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showIdentityForm()
    {
        return view('auth.register_identity');
    }

    public function submitIdentity(Request $request)
    {
        // Validasi data identitas
        $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:users'],
            'alamat' => ['required', 'string', 'max:100'],
            'no_wa' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
        ]);

        // Simpan data identitas di session untuk digunakan di langkah berikutnya
        session([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_wa' => $request->no_wa,
            'email' => $request->email,
        ]);

        return redirect()->route('register.product');
    }

    public function showProductForm()
    {
        $produks = Produk::all(); // Ambil data produk
        return view('auth.register_product', compact('produks'));
    }

    public function submitProduct(Request $request)
{
    // Validasi produk yang dipilih, pastikan ada produk yang dipilih
    $request->validate([
        'produk_id' => ['required', 'array', 'min:1'],  // Min:1 memastikan setidaknya satu produk dipilih
        'produk_id.*' => ['exists:produk,produk_id'],
    ]);

    // Ambil data identitas dari session
    $identityData = session()->only(['name', 'alamat', 'no_wa', 'email']);

    // Buat pengguna baru
    $user = User::create([
        'name' => $identityData['name'],
        'alamat' => $identityData['alamat'],
        'no_wa' => $identityData['no_wa'],
        'email' => $identityData['email'],
        'password' => Hash::make($request->password),
        'is_approved' => false, // Default user is not approved
        'terms' => 'accepted', // Menambahkan validasi untuk checkbox terms
    ]);

    // Simpan produk yang dipilih ke pivot table
    $user->produk()->attach($request->produk_id);

    // Menambahkan session untuk menampilkan modal sukses
    session()->flash('register_success', true);

    // Redirect ke halaman sukses atau login
    return redirect()->route('approved')->with('status', 'Pendaftaran berhasil. Silakan login.');
}

}


