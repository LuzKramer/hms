<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    protected $fillable = ['person', 'born', 'allergies', 'monitoring', 'prediseases', 'urgency'];

    public function person()
    {
        return $this->belongsTo(persons::class);
    }
}
