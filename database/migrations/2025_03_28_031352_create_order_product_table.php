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
        Schema::create('_order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Order_ID');
            $table->unsignedBigInteger('Product_ID');
            $table->integer('Quantity')->default(1);

            // Definir claves foráneas
            $table->foreign('Order_ID')->references('id')->on('_order')->onDelete('cascade');
            $table->foreign('Product_ID')->references('id')->on('_product')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_order_product');
    }
};

