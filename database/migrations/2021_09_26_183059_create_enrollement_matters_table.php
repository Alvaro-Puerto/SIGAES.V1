<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollementMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollement_matters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollement_id');
            $table->foreign('enrollement_id')
                  ->on('enrollements')
                  ->references('id')
                  ->onDelete('cascade');
            $table->foreignId('matter_id');
            $table->foreign('matter_id')
                  ->on('matters')
                  ->references('id')
                  ->onDelete('cascade');
            $table->foreignId('pensum_id');
            $table->foreign('pensum_id')
                        ->on('pensums')
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
        Schema::dropIfExists('enrollement_matters');
    }
}
