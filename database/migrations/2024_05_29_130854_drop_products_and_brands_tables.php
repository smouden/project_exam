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
        Schema::dropIfExists('products');
        Schema::dropIfExists('brands');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Ajoutez d'autres colonnes nécessaires ici
            $table->timestamps();
        });

        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            // Ajoutez d'autres colonnes nécessaires ici
            $table->timestamps();
        });
    }
};
