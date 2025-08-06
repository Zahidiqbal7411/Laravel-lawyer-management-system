<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $fillable = [
        'case_number',
        'title',
        'description',
        'case_type',
        'status',
        'court_name',
        'filing_date',
        'resolution_date',
        'attachment_paths',
    ];

    protected $casts = [
        'attachment_paths' => 'array',
        'filing_date' => 'date',
        'resolution_date' => 'date',
    ];
}
