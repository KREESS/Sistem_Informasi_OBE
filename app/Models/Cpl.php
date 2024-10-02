<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpl extends Model
{
    use HasFactory;

    protected $table = 'cpl';

    protected $fillable = [
        'kode_cpl',
        'cpl',
        'deskripsi',
        'threshold',
        'pl_id',
    ];

    public function pl()
    {
        return $this->belongsTo(Pl::class); // Asumsi satu CPL terkait dengan satu PL
    }
}
