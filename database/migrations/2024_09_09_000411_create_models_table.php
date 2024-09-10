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
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sku');
            $table->string('name');
            $table->float('average_price');
            $table->unsignedBigInteger('brand_id');
            $table->timestamps();
        });

        Schema::table('models', function (Blueprint $table) {
            $table->foreign('brand_id')->references('brand_id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
