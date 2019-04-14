<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('event_id');
            $table->integer('user_id');
            $table->integer('a_id')->nullable();
            $table->string('event_name')->nullable();
            $table->string('event_type')->nullable();
            $table->boolean('event_status')->nullable();
            $table->dateTime('event_time')->nullable();
            $table->integer('event_participant')->nullable();
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
