<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama','email','no_wa','deskripsi','tanggal_permohonan','waktu_permohonan','lampiran','status','bidang_id','admin_id','waktu_konfirmasi'
    ];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function logs()
    {
        return $this->hasMany(LogStatus::class);
    }
}
