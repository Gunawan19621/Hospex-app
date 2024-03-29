<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventRundownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_rundowns', function (Blueprint $table) {
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
        Schema::dropIfExists('event_rundowns');
    }
}
