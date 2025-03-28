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
        Schema::create('_product', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->text('Description')->nullable();
            $table->decimal('Price', 10, 2);
            $table->integer('Stock')->default(0);
            $table->string('Category')->nullable();
            $table->unsignedBigInteger('Created_By');
            $table->foreign('Created_By')->references('id')->on('_user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_product');
    }
};