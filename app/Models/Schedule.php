<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
   public function lawyer()
{
    return $this->belongsTo(User::class, 'lawyer_id');
}

}
