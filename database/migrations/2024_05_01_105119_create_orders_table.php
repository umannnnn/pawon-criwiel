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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->nullable();
            $table->string('product');
            $table->string('quantity');
            $table->string('name');
            $table->string('customer');
            $table->string('address');
            $table->string('phone');
            $table->string('desc');
            $table->string('price')->nullable();
            $table->enum('status', ['Menunggu konfirmasi', 'Dikonfirmasi', 'Sedang diproses', 'Selesai'])->default('Menunggu konfirmasi');
            $table->string('payment_proof')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
