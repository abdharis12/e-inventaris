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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->uuid('qr_code')->unique()->nullable();
            $table->string('nibar')->nullable();
            $table->string('nama_barang');
            $table->string('kode_barang')->unique();
            $table->string('kategori');
            $table->string('lokasi');
            $table->enum('kondisi', ['baru', 'bekas', 'lainnya'])->default('baru');
            $table->integer('jumlah');
            $table->string('deskripsi')->nullable();
            $table->date('tanggal_beli');
            $table->enum('status', ['available', 'under maintenance', 'damaged'])->default('available');
            $table->enum('status_loan', ['available', 'loaned'])->default('available');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
