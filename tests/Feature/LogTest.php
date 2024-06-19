<?php

namespace Jaleeldgk\LaravelAccessLogs\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Jaleeldgk\LaravelAccessLogs\Helpers\LogHelper;
use Jaleeldgk\LaravelAccessLogs\Models\Log;
use Tests\TestCase;

class LogTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_log()
    {
        LogHelper::createLog([
            'url' => 'http://example.com',
            'type' => 'GET',
            'params' => json_encode(['key' => 'value']),
            'user_id' => 1,
            'ip' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0',
            'response_status' => 200
        ]);

        $this->assertDatabaseHas('logs', [
            'url' => 'http://example.com',
            'type' => 'GET',
            'user_id' => 1,
            'ip' => '127.0.0.1'
        ]);
    }
}
