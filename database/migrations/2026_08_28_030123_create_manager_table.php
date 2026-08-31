<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('manager', function (Blueprint $table) {
            $table->id();
            $table->string('foto_manager');
            $table->string('nama_manager');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->string('alamat_manager');
            $table->string('pendidikan_terakhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manager');
    }
};
