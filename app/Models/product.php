<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    use HasFactory;

    protected $fillable = [
        'product',
        'product_cat',
        'quantity',
        'sellprice',
        'price',
        'name',
        'descript',
        'exp_date',
        'company',
        'generic',
    ];
}
