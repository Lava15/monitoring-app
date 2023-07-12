<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_id',
        'result',
        'status_code',
        'frequency',
        'response_time',
        'headers',
        'error',
        'completed_at',
    ];
}
