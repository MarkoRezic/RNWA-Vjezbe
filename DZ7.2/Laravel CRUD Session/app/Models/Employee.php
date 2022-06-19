<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'employee_id';


    protected $fillable = [
        'employee_id', 'first_name', 'last_name', 'email', 'phone_number', 'hire_date', 'job_id', 'salary', 'commission_pct', 'manager_id', 'department_id'
    ];
}
