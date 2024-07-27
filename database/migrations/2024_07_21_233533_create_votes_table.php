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
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contestant_id')->constrained()->onDelete('cascade');
            $table->string('email');
            $table->ipAddress('ip_address');
            $table->timestamps();

            // Ensure one vote per email or IP address per contest
            $table->unique(['contestant_id', 'email']);
            $table->unique(['contestant_id', 'ip_address']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
