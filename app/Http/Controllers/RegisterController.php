<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

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
        // Ambil semua user beserta role mereka
        $users = \App\Models\User::with('roles')->get();

        // Kirim data user ke tampilan
        return view('admin.edit_akun&roles', compact('users'));
    }


    public function getUsers()
    {
        $users = User::with('roles')->select(['id', 'name', 'email', 'nidn', 'nim']);

        return DataTables::of($users)
            ->addColumn('nidn_nim', function ($user) {
                if ($user->nidn && $user->nim) {
                    return 'NIDN: ' . $user->nidn . ' / NIM: ' . $user->nim; // Kedua NIDN dan NIM ada
                } elseif ($user->nidn) {
                    return 'NIDN: ' . $user->nidn; // Hanya NIDN yang ada
                } elseif ($user->nim) {
                    return 'NIM: ' . $user->nim; // Hanya NIM yang ada
                }
                return 'Tidak ada NIDN/NIM'; // Jika keduanya tidak ada
            })
            ->addColumn('roles', function ($user) {
                return $user->roles->pluck('name')->implode(', ');
            })
            ->addColumn('aksi', function ($user) {
                return '
                    <a href="' . route('admin.edit_user_role', $user->id) . '" class="btn btn-warning btn-sm">Edit</a>
                    <form action="' . route('admin.delete_user', $user->id) . '" method="POST" style="display:inline;" onsubmit="return confirm(\'Apakah Anda yakin ingin menghapus user ini?\');">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>';
            })
            ->filterColumn('nidn_nim', function ($query, $keyword) {
                $sql = "nidn LIKE ? OR nim LIKE ?";
                $query->whereRaw($sql, ["%{$keyword}%", "%{$keyword}%"]);
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }






    public function editUserRole($id)
    {
        // Ambil user berdasarkan id dan ambil semua roles
        $user = \App\Models\User::findOrFail($id);
        $roles = \Spatie\Permission\Models\Role::all(); // Mengambil semua roles yang tersedia

        // Tampilkan view edit_user_role dan kirim data user dan roles
        return view('admin.edit_user_role', compact('user', 'roles'));
    }

    public function updateUserRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the input data
        $request->validate([
            'nidn_nim' => 'required|string',
            'roles' => 'array',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Determine if the input is NIDN or NIM based on user role
        $nidnNimInput = $request->input('nidn_nim');

        // Check if the user has the 'dosen' role
        if ($user->roles->contains('name', 'dosen')) {
            // If the user is a lecturer, save to NIDN
            $user->nidn = $nidnNimInput; // Update NIDN
            $user->nim = null; // Clear NIM
        } elseif ($user->roles->contains('name', 'mahasiswa')) {
            // If the user is a student, save to NIM
            $user->nim = $nidnNimInput; // Update NIM
            $user->nidn = null; // Clear NIDN
        }

        // Update roles - use sync to replace current roles
        if ($request->has('roles')) {
            $user->roles()->sync($request->input('roles'));
        }

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password')); // Hash the new password
        }

        // Save changes
        $user->save();

        return redirect()->route('edit')->with('success', 'User role updated successfully.');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id); // Mencari pengguna berdasarkan ID
        $user->delete(); // Menghapus pengguna

        return redirect()->route('edit')->with('success', 'User deleted successfully.');
    }
}
