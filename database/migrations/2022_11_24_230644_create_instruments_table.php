<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instruments', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 55);
            $table->text('description');
            $table->unsignedDecimal('prix', $precision = 4, $scale=2);
            $table->unsignedInteger('stock');
            $table->string('image', 250);
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('rayon_id');
            $table->unsignedBigInteger('marque_id');
            $table->unsignedBigInteger('promotion_id');
            $table->timestamps();
            $table->foreign('categorie_id')->references('id')->on('categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('rayon_id')->references('id')->on('rayons')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('marque_id')->references('id')->on('marques')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instruments');
    }
};
