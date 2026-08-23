<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient_session extends Model
{
    public function Patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
