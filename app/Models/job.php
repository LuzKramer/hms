<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    protected $table = 'jobs';
    use HasFactory;

    protected $fillable = [
        'job',
        'name',
        'description',


    ];
}
