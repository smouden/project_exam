<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title_product');
            $table->decimal('price_product', 8, 2);
            $table->string('picture');
            $table->text('description_product');
            $table->string('size_product');
            $table->integer('gender');
            $table->string('origin');
            $table->string('shipping_time'); // champ 'shipping_time' pour le délai de livraison
            $table->text('text_product');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
