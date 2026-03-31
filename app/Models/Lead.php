<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
    'name',
    'surname',
    'email',
    'phone',
    'current_status',
    ];
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Get the operator associated with the lead.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function operator(){
        return $this->belongsTo(User::class,'operator_id');
        }
}
