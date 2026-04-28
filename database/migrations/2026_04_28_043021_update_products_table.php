<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // tambah field
            $table->text('description')->nullable();
            $table->enum('status', ['tersedia', 'habis'])->default('tersedia');

            // ubah tipe price
            $table->bigInteger('price')->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['description', 'status']);

            // rollback price (misal ke integer)
            $table->integer('price')->change();
        });
    }
};