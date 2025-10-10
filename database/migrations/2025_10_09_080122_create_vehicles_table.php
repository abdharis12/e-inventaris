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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->constrained('items')->onDelete('cascade');
            $table->string('nopol')->unique()->nullable();
            $table->string('merk')->nullable();
            $table->string('tipe')->nullable();
            $table->string('warna')->nullable();
            $table->string('tahun')->nullable();
            $table->string('bahan_bakar')->nullable();
            $table->string('kilometer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
