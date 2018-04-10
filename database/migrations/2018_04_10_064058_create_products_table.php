<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('productId');
            $table->string('productCode',50)->unique();
            $table->string('productName',255);
            $table->string('productCategory',255);
            $table->string('productType',255);
            $table->integer('minPerson');
            $table->integer('maxPerson');
            //meet point
            $table->text('meetingPointAddress',255);
            $table->text('meetingPointPlace',255);
            $table->text('meetingPointLatitude',255);
            $table->text('meetingPointLongitude',255);
            //
            $table->dateTimeTz('startSellingDate');
            $table->dateTimeTz('endSellingDate');
            $table->text('termCondition');
            $table->text('additionalInfo');
            $table->text('priceIncludes');
            $table->text('priceExcludes');
            $table->string('cancellationType');
            $table->string('minCancellationDay');
            $table->string('cancelationFee');
            $table->text('cancellationDetails');
            $table->unsignedInteger('companyId');
            $table->timestamps();

            // $table->foreign('IdCompany')->references('id')->on('company');

            $table->foreign('companyId')
                  ->references('companyId')->on('company')
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
        Schema::dropIfExists('products');
    }
}
