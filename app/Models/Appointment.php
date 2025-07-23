<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function lawyer()
    {
        return $this->belongsTo(User::class, 'lawyer_id');
    }

    public function case()
    {
        return $this->belongsTo(CourtCase::class, 'case_id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
        
    }
}
