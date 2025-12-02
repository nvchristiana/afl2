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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');                 // nama produk
            $table->integer('price');               // harga
            $table->text('description')->nullable(); // deskripsi
            $table->string('image')->nullable();     // nama file gambar
            $table->unsignedBigInteger('category_id'); // kategori
            $table->timestamps();

            // FOREIGN KEY
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

