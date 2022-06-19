<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'region_id';

    protected $fillable = [
        'region_id', 'region_name'
    ];
}
