<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensumMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensum_matters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matter_id');
            $table->foreign('matter_id')
                  ->on('matters')
                  ->references('id')
                  ->onDelete('cascade');
            $table->foreignId('teacher_id');
            $table->foreign('teacher_id')
                  ->on('teachers')
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
        Schema::dropIfExists('pensum_matters');
    }
}
