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
        Schema::create('stok_masuk', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->string('item_id');
            $table->string('suplayer_id');
            $table->integer('stok');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
            
            $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade');
            $table->foreign('suplayer_id')->references('id')->on('suplayer')->onDelete('cascade');
        });

        Schema::create('stok_keluar', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->string('item_id');
            $table->unsignedBigInteger('users_id');
            $table->integer('stok');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
            
            $table->foreign('item_id')->references('id')->on('item')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_keluar');
        Schema::dropIfExists('stok_masuk');
    }
};
