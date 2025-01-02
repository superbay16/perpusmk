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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->Integer('isbn')->unique();
            $table->string('judul');
            $table->integer('penulis_id');
            $table->integer('penerbits_id');
            $table->integer('categories_id');
            $table->integer('tahun_terbit');
            $table->string('bahasa');
            $table->integer('halaman');
            $table->text('deskripsi');
            $table->string('pdf');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
