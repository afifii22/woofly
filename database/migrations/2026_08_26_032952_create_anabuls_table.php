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
        Schema::create('anabuls', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 128);
            $table->string('ras', 128);
            $table->string('jenis_kelamin', 128);
            $table->integer('umur');
            $table->string('warna', 50);
            $table->decimal('harga', 12, 2);
            $table->string('foto', 255);
            $table->text('kondisi');
            $table->string('status_ketersediaan', 28);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anabuls');
    }
};
