<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'country_id';
    protected $keyType = 'string';


    protected $fillable = [
        'country_id', 'country_name', 'region_id'
    ];
}
