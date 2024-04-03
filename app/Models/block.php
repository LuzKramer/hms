<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class block extends Model
{
    protected $table = 'block';
    use HasFactory;

    protected $fillable = [
        'block',
        'name',
        'map',

    ];
}
