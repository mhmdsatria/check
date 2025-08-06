<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_divisi'
    ];

    /**
     * Relasi ke Konsultasi (1 Divisi bisa punya banyak konsultasi)
     */
    public function konsultasis()
    {
        return $this->hasMany(Konsultasi::class);
    }

    /**
     * Relasi ke User Admin (1 Divisi bisa punya banyak admin)
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
