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
        Schema::create('kopdes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manager_id')->constrained('manager')->onDelete('cascade');
            $table->string('foto_kopdes');
            $table->string('nama_kopdes');
            $table->string('alamat_kopdes');
            $table->date('tgl_berdiri');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kopdes');
    }
};
