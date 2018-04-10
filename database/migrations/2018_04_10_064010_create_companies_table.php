<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('companyId');
            $table->string('companyCode',150)->unique();
            $table->string('companyName');
            $table->string('companyEmail');
            $table->string('companyPhone');
            $table->string('companyWebsite');
            $table->string('companyAddress');
            $table->string('ownerName');
            $table->string('ownerEmail',150)->unique();
            $table->string('status');
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
        Schema::dropIfExists('company');
    }
}
