<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('department_id')->unsigned()->index();
            $table->string('department_name', 30);
            $table->integer('manager_id')->nullable()->unsigned()->default(null);
            $table->integer('location_id')->nullable()->unsigned()->default(null);
            $table->foreign('location_id')->references('location_id')->on('locations')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
