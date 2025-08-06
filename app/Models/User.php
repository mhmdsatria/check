<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'divisi_id', // Tambahkan ini
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi ke tabel Divisi
     */
    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}
