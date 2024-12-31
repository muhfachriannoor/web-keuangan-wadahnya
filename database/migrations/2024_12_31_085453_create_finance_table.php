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
        Schema::create('finance', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('about');
            $table->integer('price');
            $table->integer('cash_in');
            $table->integer('cash_out');
            $table->integer('balance');
            $table->unsignedBigInteger('input_by');
            $table->timestamps();

            $table->foreign('input_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance');
    }
};
