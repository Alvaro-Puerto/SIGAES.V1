<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turn_id');
            $table->foreign('turn_id')
                  ->on('turns')
                  ->references('id')
                  ->onDelete('cascade');
            $table->foreignId('level_id');
            $table->foreign('level_id')
                  ->on('levels')
                  ->references('id')
                  ->onDelete('cascade');
            $table->foreignId('modality_id');
            $table->foreign('modality_id')
                  ->on('modalities')
                  ->references('id')
                  ->onDelete('cascade');
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
            $table->string('type');
            $table->boolean('is_repeat')->default(false);
            $table->integer('count_repeat')->nullable();
            $table->string('reason_repeat')->nullable();
            $table->string('general_observation')->nullable(true);
            $table->foreignId('student_id');
            $table->foreign('student_id')
                  ->on('students')
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
        Schema::dropIfExists('enrollements');
    }
}
