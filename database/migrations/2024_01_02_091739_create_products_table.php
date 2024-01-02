<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->string('image');
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->timestamps();
        });

        Schema::create('product_shop', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('shop_id')->constrained('shops');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_shop');
        Schema::dropIfExists('products');
    }
};
