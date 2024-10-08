<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    public $timestamps = false;
    protected $table = 'diagnostics';
    use HasFactory;

    protected $primaryKey = 'diagnostic';

    protected $fillable = [
        'diagnostic',
        'patient',
        'descript',
        'disease',
        'user_id',
        'date',



    ];
}

