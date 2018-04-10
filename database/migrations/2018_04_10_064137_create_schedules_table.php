<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->increments('schduleId');
            $table->date('startDate');
            $table->date('endDate');
            $table->time('startHours');
            $table->time('endHours');
            $table->integer('maximumBooking');
            $table->integer('maximumGroup');
            $table->unsignedInteger('productId');
            $table->timestamps();

            $table->foreign('productId')
                ->references('productId')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
