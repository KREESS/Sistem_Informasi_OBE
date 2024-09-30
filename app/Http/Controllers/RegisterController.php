<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('admin.register_page');
    }

    public function register(Request $request)
    {
        $request->validate([
            'role' => 'required|string|in:mahasiswa,dosen,ketua_kbk',
            'nim' => 'nullable|string|max:20|unique:users',
            'nidn' => 'nullable|string|max:20|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Periksa apakah NIM atau NIDN harus diisi
        if ($request->role === 'mahasiswa' && !$request->nim) {
            return back()->withErrors(['nim' => 'NIM harus diisi untuk Mahasiswa']);
        } elseif (($request->role === 'dosen' || $request->role === 'ketua_kbk') && !$request->nidn) {
            return back()->withErrors(['nidn' => 'NIDN harus diisi untuk Dosen atau Ketua KBK']);
        }

        // Buat pengguna dengan role
        $user = User::create([
            'nim' => $request->role === 'mahasiswa' ? $request->nim : null,
            'nidn' => ($request->role === 'dosen' || $request->role === 'ketua_kbk') ? $request->nidn : null,
            'password' => Hash::make($request->password),
        ]);

        // Mengaitkan role
        $user->assignRole($request->role);

        // Redirect ke halaman yang diinginkan
        return redirect()->route('register')->with('success', 'Pengguna baru berhasil didaftarkan.');
    }

    public function showEdit()
    {
        return view('admin.edit_akun&roles');
    }
}
