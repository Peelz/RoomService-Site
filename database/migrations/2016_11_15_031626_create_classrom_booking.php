<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassromBooking extends Migration
{
    public function up()
    {
        Schema::dropIfExists('classroom_booking');

        Schema::create('classroom_booking',function(Blueprint $table){
            $table->increments('entity_id');
            $table->unsignedInteger('user_id') ;
            $table->string('room_id') ;
            $table->unsignedInteger('section_id')->nullable() ;
            $table->unsignedInteger('quan_nisit');
            $table->date('date');
            $table->time('start_time') ;
            $table->time('end_time') ;
            $table->text('note')->nullable();

            $table->boolean('opt_computer')->default(0);
            $table->boolean('opt_projector')->default(0);
            $table->boolean('opt_television')->default(0);
            $table->boolean('opt_wired_microphone')->default(0);
            $table->boolean('opt_vga_cable')->default(0);
            $table->boolean('opt_speaker_and_microphone')->default(0);
            $table->boolean('opt_visual_presentation')->default(0);

            $table->boolean('ex_opt_wireless_microphone')->default(0) ;
            $table->text('opt_note')->nullable();

            $table->timestamps() ;

            $table->foreign('user_id')->references('entity_id')->on('user_entity')->onDelete('cascade');
            $table->foreign('room_id')->references('room_id')->on('classroom_entity')->onDelete('cascade') ;
            $table->foreign('section_id')->references('section_id')->on('subject_sec')->onDelete('cascade');
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
        //     $table->dropForeign('room_id');
        //     $table->dropForeign('user_id');
        //     $table->dropForeign('subject_id');
        // });

        Schema::dropIfExists('classroom_booking');
    }
}
