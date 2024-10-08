<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    public $timestamps = false;
    protected $table = 'prescriptions';
    use HasFactory;

    protected $primaryKey = 'medication';

    protected $fillable = [
        'medication',
        'patient',
        'worker',
        'descript',
        'datetime',
        'concluded'


    ];
}

