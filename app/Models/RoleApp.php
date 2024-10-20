<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoleApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'app_id',
        'role'
    ];

    public function userRoleApp()
    {
        return $this->belongsTo(User::class);
    }
}
