<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensumMatterTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensum_matter_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id');
            $table->foreign('teacher_id')
            ->on('teachers')
            ->references('id')
            ->onDelete('cascade');
            $table->foreignId('pensum_matter_id');
            $table->foreign('pensum_matter_id')
                  ->on('pensum_matters')
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
        Schema::dropIfExists('pensum_matter_teachers');
    }
}
