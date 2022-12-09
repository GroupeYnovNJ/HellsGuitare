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
        Schema::create('employe_rayon', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id');
            $table->foreign('employe_id')
                ->references('id')
                ->on('employes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('rayon_id');
            $table->foreign('rayon_id')
                ->references('id')
                ->on('rayons')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unique(['employe_id', 'rayon_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employe_rayon');
    }
};
