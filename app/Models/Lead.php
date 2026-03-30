<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
    'full_name',
    'email',
    'phone',
    'current_status',
    ];
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
