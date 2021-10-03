<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollementMatterPartialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrollement_matter_partials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollement_matter_id');
            $table->foreign('enrollement_matter_id')
                  ->on('enrollement_matters')
                  ->references('id')
                  ->onDelete('cascade');
            $table->foreignId('partial_id');
            $table->foreign('partial_id')
                  ->on('partials')
                  ->references('id')
                  ->onDelete('cascade');
            $table->string('value')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')
                  ->on('users')
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
        Schema::dropIfExists('enrollement_matter_partials');
    }
}
