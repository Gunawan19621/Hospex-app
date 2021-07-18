<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('info')->nullable();
            $table->string('phone');
            $table->unsignedBigInteger('event_rundown_id');
            $table->foreign('event_rundown_id')->references('id')->on('event_rundowns')->onDelete('cascade');
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
        Schema::dropIfExists('performers');
    }
}
