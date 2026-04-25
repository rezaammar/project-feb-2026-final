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
        Schema::create('rasios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nama_saham')->nullable();
            $table->integer('beredar_awal')->nullable();
            $table->integer('beredar_tambahan')->nullable();
            $table->integer('beredar_total')->nullable();
            $table->integer('rasio_kiri')->nullable();
            $table->integer('rasio_kanan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rasios');
    }
};
