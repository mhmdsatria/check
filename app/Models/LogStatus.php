<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogStatus extends Model
{
    use HasFactory;

    protected $fillable = ['konsultasi_id','user_id','status_awal','status_akhir','catatan','waktu_perubahan'];

    public function konsultasi()
    {
        return $this->belongsTo(Konsultasi::class);
    }
}
