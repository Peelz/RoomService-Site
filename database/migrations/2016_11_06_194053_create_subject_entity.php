<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectEntity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('subject_entity');

        Schema::create('subject_entity',function(Blueprint $table){
            $table->unsignedInteger('sub_id')->unique() ;
            $table->string('name') ;
            $table->timestamps();
            $table->primary('sub_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subject_entity');
    }
}
