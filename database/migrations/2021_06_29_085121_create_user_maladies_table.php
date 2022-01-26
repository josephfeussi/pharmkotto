<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMaladiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_maladies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maladie_id')->unsigned();

            $table->unsignedBigInteger('user_id')->unsigned();

            $table->foreign('maladie_id')->references('id')->on('maladies')

                ->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')

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
        Schema::dropIfExists('user_maladies');
    }
}
