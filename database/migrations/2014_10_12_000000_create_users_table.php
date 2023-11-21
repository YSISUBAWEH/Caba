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
        Schema::create('toko', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('nomor_telepon', 15)->nullable();
            $table->string('jenis_toko');
            $table->timestamps();

        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('foto');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('toko_id');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('toko_id')->references('id')->on('toko')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('toko');
        Schema::dropIfExists('users');
    }
};
