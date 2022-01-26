<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carnets', function (Blueprint $table) {
            $table->id();
            $table->dateTimeTz("consultation_date");
            $table->longText('observation');
            $table->longText("prescription");
            $table->string("doctor_name");
            $table->string("hospital");
            $table->unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('carnets');
    }
}
