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
        Schema::create('teoritis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nama_saham')->nullable();
            $table->decimal('harga_cum',12,2)->nullable();
            $table->decimal('rasio_kiri',12,2)->nullable();
            $table->decimal('harga_tebus',12,2)->nullable();
            $table->decimal('rasio_kanan',12,2)->nullable();
            $table->decimal('harga_teoritis',12,2)->nullable();
            $table->date('recorded_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teoritis');
    }
};
