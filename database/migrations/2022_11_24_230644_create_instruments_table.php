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
            $table->text('description')->nullable();
            $table->float('prix');
            $table->integer('stock');
            $table->string('image', 250);
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('rayons_id');
            $table->unsignedBigInteger('marques_id');
            $table->timestamps();
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('rayons_id')->references('id')->on('rayons')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('marques_id')->references('id')->on('marques')->onDelete('CASCADE')->onUpdate('CASCADE');
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
