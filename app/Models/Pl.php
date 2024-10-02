<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pl extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'pl';

    // Menentukan kolom yang dapat diisi
    protected $fillable = [
        'kode_pl',
        'profil_lulusan',
        'deskripsi',
        'threshold',
    ];

    // Menentukan relasi jika ada (misalnya dengan CPL)
    public function cpl()
    {
        return $this->hasMany(Cpl::class); // Asumsi Anda punya model Cpl
    }
}
