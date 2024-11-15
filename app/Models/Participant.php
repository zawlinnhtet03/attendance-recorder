<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 
        'last_name', 
        'organization', 
        'email', 
        'phone_number', 
        'is_nuclear_medicine_member', 
        'occupation_category', 
        'license_number', 
        'is_medical_specialist_member', 
        'work_registration_number'
    ];

    public function sessions()
    {
        return $this->hasMany(ParticipantSession::class);
    }
}
