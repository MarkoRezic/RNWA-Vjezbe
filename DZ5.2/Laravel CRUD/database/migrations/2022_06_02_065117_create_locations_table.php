<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('location_id')->unsigned()->index();
            $table->string('street_address', 40)->nullable();
            $table->string('postal_code', 12)->nullable();
            $table->string('city', 30);
            $table->string('state_province', 25)->nullable();
            $table->string('country_id', 2);
            $table->foreign('country_id')->references('country_id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
