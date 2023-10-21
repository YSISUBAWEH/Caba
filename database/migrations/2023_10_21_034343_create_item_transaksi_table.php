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
        Schema::create('item_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('kode_item');
            $table->string('nomor_transaksi');
            $table->integer('quantity');
            $table->integer('harga');
            $table->timestamps();
        
            $table->index(['kode_item', 'nomor_transaksi']);
        
            $table->foreign('kode_item')->references('kode_item')->on('item')->onDelete('cascade');
            $table->foreign('nomor_transaksi')->references('nomor_transaksi')->on('transaksi')->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_transaksi');
    }
};
