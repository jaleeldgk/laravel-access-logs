<?php

namespace Jaleeldgk\LaravelAccessLogs\Helpers;

use Jaleeldgk\LaravelAccessLogs\Models\AccessLog;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LogHelper
{
    /**
     * Create a new log entry.
     *
     * @param array $data
     * @return AccessLog
     */
    public static function createLog(array $data = [])
    {
        // Get request data
        $request = request();
        $sessionId = $request->hasSession() ? $request->session()->getId() : null;
        if(config('laravel-access-logs.log_user_id')){
            $user = $request->attributes->get('logged_in_user');
            if($user)
                $user_id = $user->id;
            else
                $user_id = null;
        } else
            $user_id = null;
        $responseStatus = $request->attributes->get('response_status', null);
        // Merge provided data with default values from the request
        $data = array_merge([
            'url' => $request->fullUrl(),
            'referral' => config('laravel-access-logs.log_referral') ? $request->header('Referer') : null,
            'type' => $request->method(),
            'params' => config('laravel-access-logs.log_params') ? json_encode($request->all()) : null,
            'user_id' => $user_id,
            'ip' => config('laravel-access-logs.log_ip') ? $request->ip() : null,
            'user_agent' => config('laravel-access-logs.log_user_agent') ? $request->header('User-Agent') : null,
            'response_status' => $responseStatus,
            'session_id' => $sessionId,
            'error_message' => null,
            'error_trace' => null,
            'feedback' => null,
            'content' => $request->getContent(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ], $data);

        return AccessLog::create($data);
    }
}
