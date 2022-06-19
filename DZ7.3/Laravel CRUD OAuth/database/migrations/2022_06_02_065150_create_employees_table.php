<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->integer('employee_id')->primary()->unsigned()->index();
            $table->string('first_name', 20)->nullable()->default(null);
            $table->string('last_name', 25);
            $table->string('email', 25);
            $table->string('phone_number', 20)->nullable()->default(null);
            $table->date('hire_date');
            $table->string('job_id', 10);
            $table->decimal('salary', 8, 2);
            $table->decimal('commission_pct', 2, 2)->nullable()->default(null);
            $table->integer('manager_id')->nullable()->unsigned()->default(null);
            $table->integer('department_id')->nullable()->unsigned()->default(null);
            $table->foreign('job_id')->references('job_id')->on('jobs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
