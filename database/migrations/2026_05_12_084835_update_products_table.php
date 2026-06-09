<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah kolom 'status' hanya jika belum ada
        if (!Schema::hasColumn('products', 'status')) {
            Schema::table('products', function (Blueprint $table) {
                $table->enum('status', ['tersedia', 'tidak tersedia'])->default('tersedia');
            });
        }

        // Ubah tipe kolom 'price'
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('price')->change();
        });
    }

    public function down(): void
    {
        // Hapus kolom 'status' jika ada
        if (Schema::hasColumn('products', 'status')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }

        // Rollback tipe 'price' (misal kembali ke integer)
        Schema::table('products', function (Blueprint $table) {
            $table->integer('price')->change();
        });
    }
};