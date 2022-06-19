<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->string('job_id', 10)->primary()->index();
            $table->string('job_title', 35);
            $table->decimal('min_salary', 8, 0)->nullable()->unsigned()->default(null);
            $table->decimal('max_salary', 8, 0)->nullable()->unsigned()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
