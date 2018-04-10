<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerary', function (Blueprint $table) {
            $table->increments('itineraryId');
            $table->string('day');
            $table->time('startTime');
            $table->time('endTime');
            $table->string('agendaCategory');
            $table->string('agenda');
            $table->text('description');
            $table->unsignedInteger('productId');
            $table->unsignedInteger('destinationId');
            $table->timestamps();

            $table->foreign('productId')
                ->references('productId')->on('product')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('destinationId')
                ->references('destinationId')->on('destination')
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
        Schema::dropIfExists('itinerary');
    }
}
