<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaladieConseilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maladie_conseil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maladie_id')->unsigned();

            $table->unsignedBigInteger('conseil_id')->unsigned();

            $table->foreign('maladie_id')->references('id')->on('maladies')

                ->onDelete('cascade');

            $table->foreign('conseil_id')->references('id')->on('conseils')

                ->onDelete('cascade');
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
        Schema::dropIfExists('maladie_conseil');
    }
}
