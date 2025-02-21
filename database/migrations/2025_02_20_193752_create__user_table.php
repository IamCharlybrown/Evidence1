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
        Schema::create('_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('_role');
            $table->string('Name');
            $table->string('Email');
            $table->string('Password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_user');
    }
};
