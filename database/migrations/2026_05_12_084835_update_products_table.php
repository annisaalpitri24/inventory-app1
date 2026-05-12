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
        
            $table->enum('status', ['tersedia', 'tidak tersedia'])->default('tersedia');

            // ubah tipe price
            $table->bigInteger('price')->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
           

            // rollback price (misal ke integer)
            $table->integer('price')->change();
        });
    }
};