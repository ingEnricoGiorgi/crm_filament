<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'lead_id',
        'date_start',
        'duration',
        'note',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
    
}
