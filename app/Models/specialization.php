<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialization extends Model
{
    protected $table = 'specializations';
    use HasFactory;

    protected $fillable = [
        'specialization',
        'name',
        'description',


    ];
}
