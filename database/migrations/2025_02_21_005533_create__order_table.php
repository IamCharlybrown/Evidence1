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
        Schema::create('_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Client_ID');
            $table->foreign('Client_ID')->references('id')->on('_client');
            $table->unsignedBigInteger('Status_ID');
            $table->foreign('Status_ID')->references('id')->on('_order_status');
            $table->string('InvoiceNumber');
            $table->string('DateTime');
            $table->string('DeliveryAddress');
            $table->string('Notes');
            $table->unsignedBigInteger('Delivery_Photo_ID');
            $table->foreign('Delivery_Photo_ID')->references('id')->on('_delivery_photo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_order');
    }
};
