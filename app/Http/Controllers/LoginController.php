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
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Cek kredensial pengguna dengan Auth::attempt
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

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
            'email' => 'Email atau password salah.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
