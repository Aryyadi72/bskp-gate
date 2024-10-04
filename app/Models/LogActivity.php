<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip_address',
        'otp_code',
        'otp_encrypt',
        'otp_valid_start',
        'otp_valid_until',
        'login_at',
        'logout_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logActivityDetail()
    {
        return $this->belongsTo(LogActivityDetail::class);
    }
}
