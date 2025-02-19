<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\UserProduk;
use App\Models\Produk;

class AdminUserController extends Controller
{
    public function index()
    {
        // Mengambil pengguna yang belum disetujui dan tidak memiliki peran 'super admin' atau 'admin'
        $users = User::where('is_approved', false)
                     ->doesntHave('roles') // Mengecualikan pengguna tanpa peran
                     ->orWhereDoesntHave('roles', function ($query) {
                         $query->whereIn('name', ['super_admin', 'admin']);
                     })
                     ->get();

        return view('admin.users.index', compact('users'));
    }

    public function approve(User $user, Request $request)
    {
        // Pastikan user belum di-approve
        if ($user->is_approved) {
            return redirect()->back()->with('error', 'User sudah di-approve.');
        }

        // Mengupdate status approval dan role
        $user->is_approved = true;

        // Validasi dan assign role
        if ($request->has('role') && in_array($request->input('role'), ['pegawai', 'peserta'])) {
            $roleName = $request->input('role');
            if (Role::where('name', $roleName)->exists()) {
                $role = Role::findByName($roleName);
                $user->assignRole($role);
            } else {
                return redirect()->back()->with('error', 'Role yang dipilih tidak valid.');
            }
        }

        // Simpan perubahan status approval dan role
        $user->save();

        // Mengambil iuran yang diinput admin
        if ($request->has('iuran') && is_array($request->iuran)) {
            foreach ($request->iuran as $userProdukId => $iuranData) {
                $userProduk = UserProduk::find($userProdukId);
                if ($userProduk) {
                    // Update jumlah bagian yang diinput oleh admin
                    $userProduk->jumlah_bagian = $request->input('jumlah_bagian') ?? 1; // Gunakan nilai default 1 jika tidak diinput
                    $userProduk->save();

                    // Menghitung total harga produk
                    $totalHarga = $userProduk->produk->harga * $userProduk->quantity; // Pastikan `quantity` ada dalam relasi
                    $jumlahBagian = $userProduk->jumlah_bagian; // Jumlah bagian yang diinputkan admin
                    $iuranPerBagian = $totalHarga / $jumlahBagian;

                    // Menyimpan data iuran untuk setiap bagian
                    foreach ($iuranData as $bagianKe => $status) {
                        $userProduk->iuran()->create([ // Pastikan relasi `iuran` ada pada model `UserProduk`
                            'bagian_ke' => $bagianKe,
                            'jumlah_iuran' => $iuranPerBagian,
                            'is_paid' => $status == 'terbayar', // Menandai apakah bagian terbayar
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success', 'User approved dan role berhasil ditetapkan.');
    }

    public function approvedUsers()
    {
        // Mengambil pengguna yang sudah di-approve
        $approvedUsers = User::where('is_approved', true)->get();
        return view('admin.users.approved', compact('approvedUsers'));
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        
        // Optionally, check if user is an admin or super_admin
        if ($user->hasRole('admin') || $user->hasRole('super_admin')) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus pengguna dengan peran admin atau super admin.');
        }

        // Delete the user
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }

    public function updatePaymentStatus(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bagian' => 'required|integer|min:1|max:11',
            'status' => 'required|in:terbayar,belum_terbayar',
        ]);

        // Ambil semua user_produk milik user
        $userProduks = UserProduk::where('user_id', $request->user_id)->get();

        if ($userProduks->isEmpty()) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan untuk user ini.');
        }

        // Hitung total harga produk
        $totalHarga = $userProduks->map(function ($userProduk) {
            return $userProduk->produk->harga * $userProduk->quantity ?? 0; // Pastikan harga produk dan quantity tersedia
        })->sum();

        // Harga per bagian (total dibagi 11 bagian)
        $hargaPerBagian = $totalHarga / 11;

        // Update status pembayaran untuk setiap produk
        foreach ($userProduks as $userProduk) {
            $bagian = "status_bagian_" . $request->bagian;
            $userProduk->$bagian = $request->status;

            // Simpan perubahan
            $userProduk->save();
        }

        return redirect()->back()->with('success', "Status pembayaran berhasil diperbarui. Harga per bagian: Rp" . number_format($hargaPerBagian, 2, ',', '.'));
    }
}
