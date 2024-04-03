<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $table = 'patient';
    use HasFactory;

    protected $fillable = [
        'patient',
        'born',
        'allergies',
        'monitoring',
        'prediseases',
        'urgency',
        'name',
        'cpf',
        'codsus',
        'fone',
        'email',
        'img',
        'blood',

    ];
}
