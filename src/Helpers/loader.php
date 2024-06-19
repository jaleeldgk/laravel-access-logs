<?php

use Jaleeldgk\LaravelAccessLogs\Helpers\LogHelper;

if (!function_exists('logRequest')) {
    function logRequest()
    {
        LogHelper::createLog();
    }
}
