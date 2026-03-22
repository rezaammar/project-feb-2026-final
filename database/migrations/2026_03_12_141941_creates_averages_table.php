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
        Schema::create('averages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nama_saham')->nullable();
            $table->string('jenis_average')->nullable();
            $table->decimal('harga_awal',12,2);
            $table->integer('jumlah_awal')->nullable();
            $table->decimal('harga_baru',12,2);
            $table->integer('jumlah_baru')->nullable();
            $table->decimal('average',12,2)->nullable();
            $table->date('recorded_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('averages');
    }
};
