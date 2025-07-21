<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
   public function case()
{
    return $this->belongsTo(CourtCase::class);
}

public function uploader()
{
    return $this->belongsTo(User::class, 'uploaded_by');
}

}
