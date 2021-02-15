<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsRundownTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_rundown', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->string('task');
            $table->integer('duration');
            $table->string('location');
            $table->foreignId('event_schedule_id')->references('id')->on('event_schedules')->onDelete('cascade');
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
        Schema::dropIfExists('events_rundown');
    }
}
