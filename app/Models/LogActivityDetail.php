<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivityDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_log_id',
        'accessing_app',
        'accessing_at',
        'accessing_until',
    ];

    public function logActivity()
    {
        return $this->belongsTo(LogActivity::class);
    }
}