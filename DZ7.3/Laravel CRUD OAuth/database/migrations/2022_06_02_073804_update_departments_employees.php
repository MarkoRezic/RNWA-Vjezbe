<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDepartmentsEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departments', function (Blueprint $table) {
            $table->foreign('manager_id')->references('employee_id')->on('employees')->onDelete('set null');
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('manager_id')->references('employee_id')->on('employees')->onDelete('set null');
            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
