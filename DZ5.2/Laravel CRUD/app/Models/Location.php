<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'location_id';


    protected $fillable = [
        'street_address', 'postal_code', 'city', 'state_province', 'country_id'
    ];
}
