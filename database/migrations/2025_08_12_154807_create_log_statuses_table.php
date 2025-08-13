<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('log_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('konsultasi_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('status_awal');
            $table->string('status_akhir');
            $table->text('catatan')->nullable();
            $table->timestamp('waktu_perubahan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('log_statuses');
    }
}
