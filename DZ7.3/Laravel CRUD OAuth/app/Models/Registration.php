<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registration';

    public $timestamps = false;

    protected $primaryKey = 'rid';

    protected $fillable = [
        'fname', 'lname', 'gender', 'dob'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'rid', 'rid');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'rid', 'rid');
    }
}
