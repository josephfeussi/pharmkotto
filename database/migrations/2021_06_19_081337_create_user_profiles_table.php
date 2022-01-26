<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('mobile_phone')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('city')->default("Non défini");
            $table->dateTime('birthday')->nullable();
            $table->string('photo')->default('https://image.flaticon.com/icons/png/512/149/149071.png');
            $table->enum('gender', ['m', 'f'])->nullable();

            //Foreign key on User table
            $table->unsignedBigInteger('user_id')->unsigned();
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
        Schema::dropIfExists('user_profiles');
    }
}
