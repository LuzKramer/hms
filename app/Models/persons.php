<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persons extends Model
{
    protected $fillable = ['name', 'cpf', 'codsus', 'fone', 'email', 'img', 'blood'];

    public function patient()
    {
        return $this->hasOne(patients::class);
    }

    public function bloodType()
    {
        return $this->belongsTo(bloods::class, 'blood');
    }
}
