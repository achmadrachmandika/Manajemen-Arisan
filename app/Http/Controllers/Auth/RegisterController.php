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

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $produks = Produk::all();
        return view('auth.register', compact('produks'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'produk_id' => ['required', 'exists:produk,produk_id'], // Pastikan validasi sesuai dengan nama kolom primary key
        ]);
    }

    protected function create(array $data)
    {
        // Simpan pengguna baru
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'is_approved' => false, // Default user is not approved
        ]);

        // Jika ada produk yang dipilih, simpan ke pivot table user_produk
        if (isset($data['produk_id'])) {
            $user->produk()->attach($data['produk_id']);
        }

        $user->assignRole($role);  

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        return redirect($this->redirectTo)->with('registered', true);
    }
}
