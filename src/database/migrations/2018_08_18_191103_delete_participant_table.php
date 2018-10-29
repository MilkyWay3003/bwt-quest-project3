<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('participant');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('participant', function (Blueprint $table) {
            $table->increments('id')->unsigned()->autoIncrement();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthdate');
            $table->string('reportsubject');
            $table->string('country');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->text('aboutme')->nullable();        
            $table->string('photo')->nullable();   
            $table->rememberToken();
            $table->timestamps();
        });
    }
}
