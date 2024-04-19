<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'patient';
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'patient',
        'sex',
        'born',
        'monitoring',
        'urgency',
        'name',
        'cpf',
        'codsus',
        'fone',
        'email',
        'img',
        'blood',
        'symptoms',
        'systolic_pressure',
        'diastolic_pressure',
        'temperature',
        'heart_rate',
        'medical_history',
        'observations',
        'ai_resp',

    ];
}
