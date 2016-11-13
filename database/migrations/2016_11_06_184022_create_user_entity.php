<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('user_entity');

        Schema::create('user_entity', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('role');
            $table->boolean('status');
            $table->rememberToken();
            $table->timestamps();
            $table->primary(['user_id']);


        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_entity');
    }
}
