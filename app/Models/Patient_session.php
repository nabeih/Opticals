<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $patient_id
 * @property string $session_date
 * @property string|null $session_type
 * @property string|null $diagnosis
 * @property string|null $medical_report
 * @property string|null $treatment
 * @property string|null $next_appointment
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Patient $Patient
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session whereDiagnosis($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session whereMedicalReport($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session whereNextAppointment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session whereSessionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session whereSessionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session whereTreatment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient_session whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Patient_session extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function Patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
