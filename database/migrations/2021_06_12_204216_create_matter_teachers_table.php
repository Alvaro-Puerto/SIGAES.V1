<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatterTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matter_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id');
            $table->foreign('teacher_id')
                  ->on('teachers')
                  ->references('id')
                  ->onDelete('cascade');
            $table->foreignId('matter_id');
            $table->foreign('matter_id')
                  ->on('matters')
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
        Schema::dropIfExists('matter_teachers');
    }
}
