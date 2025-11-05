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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->string('currency')->default('eur');
            $table->integer('periodicity')->default(1);
            $table->string('periodicity_type')->default('month'); // 'month' or 'year'
            $table->boolean('is_active')->default(true);
            $table->string('stripe_price')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
