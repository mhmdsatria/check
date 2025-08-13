<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('no_wa');
            $table->text('deskripsi');
            $table->date('tanggal_permohonan')->nullable();
            $table->string('waktu_permohonan')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('status')->default('pending');
            $table->timestamp('waktu_konfirmasi')->nullable();
            $table->foreignId('bidang_id')->nullable()->constrained('bidangs')->nullOnDelete();
            $table->foreignId('admin_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('konsultasis');
    }
};
