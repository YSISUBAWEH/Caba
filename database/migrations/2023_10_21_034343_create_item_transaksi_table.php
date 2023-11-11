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
            $table->string('item_id');
            $table->string('transaksi_id');
            $table->integer('quantity');
            $table->integer('harga');
            $table->timestamps();
        
            $table->index('item_id');
            $table->index('transaksi_id');

            $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade');
            $table->foreign('transaksi_id')->references('id')->on('transaksi')->onDelete('cascade');
      
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
