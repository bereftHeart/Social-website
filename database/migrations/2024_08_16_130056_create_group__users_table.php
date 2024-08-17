<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('group__users', function (Blueprint $table) {
            $table->id();
            $table->string('role', 25)->default('member');
            $table->string('status', 25)->default('pending');
            $table->string('token', 1024)->nullable();
            $table->timestamp('token_expires_at')->nullable();
            $table->timestamp('joined_at')->nullable();
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group__users');
    }
};
