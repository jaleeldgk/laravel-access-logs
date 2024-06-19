<?php

namespace Jaleeldgk\LaravelAccessLogs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'referral',
        'type',
        'params',
        'user_id',
        'content',
        'ip',
        'response_status',
        'user_agent',
        'session_id',
        'error_message',
        'error_trace',
        'feedback',
        'created_at',
        'updated_at'
    ];
}
