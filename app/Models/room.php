<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $table = 'room';
    use HasFactory;

    protected $fillable = [
    'room',
    'name',
    'room_type',
    'occupied',
    'block',
    'floor',
    'descript',
    ];
}
