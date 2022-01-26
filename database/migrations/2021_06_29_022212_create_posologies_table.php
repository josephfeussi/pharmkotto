<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posologies', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('min_age')->nullable();
            $table->unsignedTinyInteger('max_age')->nullable();
            $table->unsignedTinyInteger('min_weight')->nullable();
            $table->unsignedTinyInteger('max_weight')->nullable();
            $table->string('dose');
            $table->unsignedBigInteger('medicament_id');
            $table->foreign('medicament_id')->references('id')->on('medicaments')->onDelete('cascade');
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
        Schema::dropIfExists('posologies');
    }
}
