<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_entity', function (Blueprint $table) {
            $table->string('admin_id')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('firstname');
            $table->string('lastname');

            $table->primary('admin_id');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_entity');
    }
}
