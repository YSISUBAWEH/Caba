 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Membuat tabel 'kategori'
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kate')->unique();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Membuat tabel 'ukuran' dengan kolom 'kode_kate' sebagai kunci asing
        Schema::create('ukuran', function (Blueprint $table) {
            $table->id();
            $table->string('kode_uk,')->unique();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Membuat tabel 'item' dengan kolom 'kode_kate' dan 'kode_uk' sebagai kunci asing
        Schema::create('item', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->string('name')->unique();
            $table->string('harga');
            $table->string('stok');
            $table->string('SKU'); 
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('id');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('kategori');
            $table->foreign('id')->references('id')->on('ukuran');
        });
    }

    public function down(): void
    {
        // Menghapus tabel 'item' sebelum 'ukuran' dan 'kategori' untuk menghindari kendala kunci asing
        Schema::dropIfExists('item');
        Schema::dropIfExists('ukuran');
        Schema::dropIfExists('kategori');
    }
};
