<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_rules', function (Blueprint $table) {
            $table->id();
            $table->string('freq');
            $table->integer('interval');
            $table->string('byweeekday')->nullable();
            $table->string('dtstart');
            $table->string('until');
            $table->foreignId('event_id');
            $table->foreign('event_id')
                  ->on('events')
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
        Schema::dropIfExists('event_rules');
    }
}
