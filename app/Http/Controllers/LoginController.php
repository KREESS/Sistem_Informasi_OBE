<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login_page');
    }

    public function login(Request $request)
    {
        // Validasi input login, pastikan salah satu dari email, nidn, atau nim diisi
        $request->validate([
            'login' => 'required|string', // Bisa berupa email, nidn, atau nim
            'password' => 'required|string',
        ]);

        // Tentukan apakah input adalah email, NIDN, atau NIM
        $loginType = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : (is_numeric($request->login) ? 'nidn' : 'nim');

        // Cek kredensial pengguna dengan Auth::attempt menggunakan input yang sesuai
        if (Auth::attempt([$loginType => $request->login, 'password' => $request->password])) {

            // Setelah login berhasil, periksa role pengguna
            $user = Auth::user();

            // Jika pengguna adalah admin, arahkan ke dashboard admin
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');

                // Jika pengguna adalah dosen, arahkan ke dashboard dosen
            } elseif ($user->hasRole('dosen')) {
                return redirect()->route('dosen.dashboard');
            }

            // Jika pengguna tidak memiliki role yang sesuai, logout dan beri pesan kesalahan
            Auth::logout();
            return back()->withErrors(['role' => 'Anda tidak memiliki akses ke sistem.']);
        }

        // Jika login gagal, kembalikan dengan pesan kesalahan
        return back()->withErrors([
            'login' => 'Email, NIDN, NIM, atau password salah.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
