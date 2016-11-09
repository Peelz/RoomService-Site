<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_entity',function(Blueprint $table){
            $table->unsignedInteger('room_id')->unique() ;
            $table->unsignedInteger('build') ;
            $table->timestamps();

            $table->primary('room_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classroom_entity') ;

    }
}
