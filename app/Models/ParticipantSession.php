<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantSession extends Model
{
    use HasFactory;

    // Define the table if it's not following Laravel's naming conventions
    protected $table = 'participant_sessions';

    // Allow mass assignment for these fields
    protected $fillable = [
        'participant_id',
        'check_in_time',
        'check_out_time',
    ];

    // Define a relationship to the Participant model
    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
