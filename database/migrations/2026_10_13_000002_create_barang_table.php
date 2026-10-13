<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang', 30)->unique();
            $table->string('nama', 120);
            $table->foreignId('kategori_id')->constrained('kategori')->restrictOnDelete();
            $table->string('lokasi', 100);
            $table->unsignedInteger('jumlah')->default(0);
            $table->unsignedInteger('stok_minimum')->default(0);
            $table->decimal('harga_satuan', 12, 2)->default(0);
            $table->enum('kondisi', ['Baik', 'Perlu Perbaikan', 'Rusak'])->default('Baik');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
