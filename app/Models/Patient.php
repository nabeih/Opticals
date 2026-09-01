<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $fullname
 * @property int|null $age
 * @property string $phone
 * @property string|null $address
 * @property string|null $preferred_date
 * @property string|null $complaint_type
 * @property string|null $complaint_description
 * @property string|null $notes
 * @property string|null $pathfile
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Patient_session> $Patient_session
 * @property-read int|null $patient_session_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient whereComplaintDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient whereComplaintType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient whereFullname($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient wherePathfile($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient wherePreferredDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Patient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Patient extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function Patient_session()
    {
        return $this->hasMany(Patient_session::class);
    }
}
