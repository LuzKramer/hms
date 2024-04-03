<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companies extends Model
{
    protected $table = 'company';
    use HasFactory;

    protected $fillable = [
        'company',
        'name',

    ];
}
