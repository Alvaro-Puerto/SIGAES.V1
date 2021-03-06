<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('start')->nullable();
            $table->string('end')->nullable();
            $table->string('startStr')->nullable();
            $table->string('endStart')->nullable();
            $table->string('backgroundColor')->nullable();
            $table->string('classNames')->nullable();
            $table->string('daysOfWeek')->nullable();
            $table->string('startTime')->nullable();
            $table->string('endTime')->nullable();
            $table->string('startRecur')->nullable();
            $table->string('endRecur')->nullable();
            $table->foreignId('course_id');
            $table->foreign('course_id')
                  ->on('courses')
                  ->references('id')
                  ->onDelete('cascade');
            $table->foreignId('school_year_id');
            $table->foreign('school_year_id')
                  ->on('school_years')
                  ->references('id')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('events');
    }
}
