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
        return view('auth.register_page');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nidn' => 'nullable|string|max:20|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'nidn' => $request->nidn,
            'password' => Hash::make($request->password),
        ]);

        // Tambahkan role default
        $user->assignRole('dosen');

        Auth::login($user);

        return redirect()->route('login');
    }
}
