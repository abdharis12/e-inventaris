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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items')->onDelete('cascade');
            $table->string('deskripsi');
            $table->decimal('biaya', 12, 2)->nullable();
            $table->enum('status', ['pending', 'in progress', 'completed', 'damaged'])->default('pending');
            $table->enum('jenis_service', ['service berkala', 'service kerusakan'])->default('service berkala');
            $table->date('tanggal_service');
            $table->integer('interval_hari')->nullable();
            $table->date('next_service')->nullable(); 
            $table->boolean('reminder_h7_sent')->default(false);
            $table->boolean('reminder_h3_sent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
