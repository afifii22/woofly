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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('anabul_id')->constrained('anabuls')->cascadeOnDelete();
            $table->string('no_hp', 16);
            $table->string('metode_pembelian', 50);
            $table->date('tanggal_pengambilan')->nullable();
            $table->time('waktu_pengambilan')->nullable();
            $table->text('alamat_pengiriman')->nullable();
            $table->string('estimasi_pengiriman', 50)->nullable();
            $table->string('metode_pembayaran', 50);
            $table->string('bukti_pembayaran', 255)->nullable();
            $table->text('catatan')->nullable();
            $table->string('status_pesanan', 20);
            $table->text('alasan_pembatalan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
