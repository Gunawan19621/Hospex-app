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
            $table->date('date');
            $table->string('location');
            $table->text('notes');
            $table->unsignedBigInteger('event_exhibitor_id');
            $table->unsignedBigInteger('visitor_id');
            $table->foreign('event_exhibitor_id')->references('id')->on('event_exhibitors')->onDelete('cascade');
            $table->foreign('visitor_id')->references('id')->on('event_visitors')->onDelete('cascade');
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
