<?php

namespace App\Http\Controllers;

use App\Models\Pl;
use Illuminate\Http\Request;

class PlController extends Controller
{
    // Method untuk menampilkan form tambah PL
    public function showTambahPl()
    {
        return view('admin.tambah_pl'); // Pastikan Anda memiliki file view di resources/views/pl/tambah.blade.php
    }

    // Method untuk menyimpan PL baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kode_pl' => 'required|unique:pl,kode_pl|max:10', // Contoh validasi
            'profil_lulusan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'threshold' => 'required|numeric|min:0|max:100', // Misal threshold harus 0-100
        ]);

        // Simpan data ke database
        Pl::create([
            'kode_pl' => $request->kode_pl,
            'profil_lulusan' => $request->profil_lulusan,
            'deskripsi' => $request->deskripsi,
            'threshold' => $request->threshold,
        ]);

        // Redirect atau kembalikan response
        return redirect()->route('pl')->with('success', 'PL berhasil ditambahkan.');
    }

    public function showPl()
    {
        $pls = PL::all();
        return view('admin.show_pl', compact('pls'));
    }

    public function editPl($id)
    {
        $pl = PL::find($id);
        return view('admin.edit_pl', compact('pl'));
    }

    public function updatePl(Request $request, $id)
    {
        $pl = PL::find($id);
        $pl->kode_pl = $request->input('kode_pl');
        $pl->profil_lulusan = $request->input('profil_lulusan');
        $pl->deskripsi = $request->input('deskripsi');
        $pl->threshold = $request->input('threshold');
        $pl->save();

        return redirect()->route('manage.pl')->with('success', 'Profil Lulusan berhasil diperbarui.');
    }

    public function deletePl($id)
    {
        $pl = PL::find($id);
        $pl->delete();

        return redirect()->route('manage.pl')->with('success', 'Profil Lulusan berhasil dihapus.');
    }
}
