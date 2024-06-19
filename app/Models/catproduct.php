<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catproduct extends Model
{
    protected $table = 'product_cat';
    use HasFactory;

    protected $fillable = [
        'product_cat',
        'name',

    ];
}
