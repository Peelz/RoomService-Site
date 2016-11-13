<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('classroom_booking');

        Schema::create('classroom_booking',function(Blueprint $table){
            $table->increments('id');
            $table->string('user_id') ;
            $table->unsignedInteger('room_id') ;
            $table->unsignedInteger('subject_id') ;
            $table->unsignedInteger('quan_nisit');
            $table->date('date');
            $table->time('start_time') ;
            $table->time('end_time') ;
            $table->text('note');
            $table->timestamps() ;

            $table->foreign('user_id')->references('user_id')->on('user_entity')->onDelete('cascade');
            $table->foreign('room_id')->references('room_id')->on('classroom_entity')->onDelete('cascade') ;
            $table->foreign('subject_id')->references('sub_id')->on('subject_entity')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('classroom_booking', function ($table) {
        //
        //     $table->dropForeign(['user_id','room_id']);
        // });

        Schema::drop('classroom_booking');
    }
}
