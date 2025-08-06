<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'no_wa',
        'instansi',
        'email',
        'tanggal',
        'waktu',
        'deskripsi',
        'file',
        'status',
        'divisi_id', // ✅ tambahkan divisi_id
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
