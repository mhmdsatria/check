<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('no_wa');
            $table->string('instansi')->nullable();
            $table->string('email');
            $table->date('tanggal');
            $table->time('waktu');
            $table->text('deskripsi');
            $table->string('file')->nullable();
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->foreignId('divisi_id')->constrained('divisis')->onDelete('cascade'); // ✅ Tambahkan relasi ke divisi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
};
