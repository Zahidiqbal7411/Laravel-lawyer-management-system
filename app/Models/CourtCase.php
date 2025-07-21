<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourtCase extends Model
{
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function lawyer()
    {
        return $this->belongsTo(User::class, 'lawyer_id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function hearings()
    {
        return $this->hasMany(Hearing::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
