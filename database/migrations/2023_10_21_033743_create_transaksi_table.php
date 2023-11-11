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
    Schema::create('transaksi', function (Blueprint $table) {
        $table->string('id')->unique()->primary();
        $table->unsignedBigInteger('users_id'); // Ubah tipe data menjadi unsignedBigInteger
        $table->integer('total_pembayaran');
        $table->integer('uang_pembayaran');
        $table->integer('kembalian');
        $table->timestamp('tanggal_pembayaran');
        $table->string('metode_pembayaran');
        $table->timestamps();

        $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
