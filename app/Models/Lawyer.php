<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
   public function user()
{
    return $this->belongsTo(User::class);
}

public function specialization()
{
    return $this->belongsTo(Specialization::class);
}

public function cases()
{
    return $this->hasMany(CourtCase::class, 'lawyer_id');
}

public function appointments()
{
    return $this->hasMany(Appointment::class, 'lawyer_id');
}

public function invoices()
{
    return $this->hasMany(Invoice::class, 'lawyer_id');
}

public function reviews()
{
    return $this->hasMany(Review::class, 'lawyer_id');
}

public function schedules()
{
    return $this->hasMany(Schedule::class);
}

}
