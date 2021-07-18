<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_requests', function (Blueprint $table) {
            $table->id();
            $table->enum('status',[0,1,2]);
            $table->unsignedBigInteger('event_exhibitor_id');
            $table->unsignedBigInteger('event_visitor_id');
            $table->unsignedBigInteger('available_schedule_id');
            $table->foreign('event_exhibitor_id')->references('id')->on('event_exhibitors')->onDelete('cascade');
            $table->foreign('event_visitor_id')->references('id')->on('event_visitors')->onDelete('cascade');
            $table->foreign('available_schedule_id')->references('id')->on('available_schedules')->onDelete('cascade');
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
        Schema::dropIfExists('match_requests');
    }
}
