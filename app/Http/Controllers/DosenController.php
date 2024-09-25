<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function dashboard()
    {
        // Logika untuk dashboard dosen
        return view('dosen.dashboard');
    }
}
