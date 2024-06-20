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
        Schema::create('session_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('start_datetime')->nullable();
            $table->string('end_datetime')->nullable();
            $table->string('completed_at')->nullable();
            // $table->enum('complete_status',['','in-active'])->default('active');
            $table->integer('trainer_skill_id')->nullable();
            $table->integer('trainer_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->enum('status',['accept','reject','complete','pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_bookings');
    }
};
