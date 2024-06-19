<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('access_logs', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable();
            $table->string('referral')->nullable();
            $table->string('type', 25)->default('GET');
            $table->text('params')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->mediumText('content')->nullable();
            $table->string('ip', 45)->nullable();
            $table->integer('response_status')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('session_id')->nullable();
            $table->text('error_message')->nullable();
            $table->text('error_trace')->nullable();
            $table->text('feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('access_logs');
    }
}
