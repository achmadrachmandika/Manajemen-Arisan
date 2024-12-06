<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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

    $user->is_approved = true;

    // Validasi dan assign role hanya ke 'admin' atau 'peserta'
    if ($request->has('role') && in_array($request->input('role'), ['admin', 'peserta'])) {
        $roleName = $request->input('role');
        if (Role::where('name', $roleName)->exists()) {
            $role = Role::findByName($roleName);
            $user->assignRole($role); // Tetapkan role baru pada user
        } else {
            return redirect()->back()->with('error', 'Role yang dipilih tidak valid.');
        }
    }

    // Simpan perubahan status approval dan role
    $user->save();

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
}