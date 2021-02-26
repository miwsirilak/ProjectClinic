<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id')->nullable();
            $table->string('userid')->nullable();
            $table->string('title')->nullable();
            $table->string('username')->nullable();
            $table->string('sympotm')->nullable();
            $table->string('booked')->nullable();
            $table->string('Workday')->nullable();
            $table->date('date');
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
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
