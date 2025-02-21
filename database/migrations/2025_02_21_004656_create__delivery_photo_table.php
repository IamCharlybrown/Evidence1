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
        Schema::create('_delivery_photo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Status_ID');
            $table->foreign('Status_ID')->references('id')->on('_order_status');
            $table->string('PhotoURL');
            $table->string('Type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_delivery_photo');
    }
};
