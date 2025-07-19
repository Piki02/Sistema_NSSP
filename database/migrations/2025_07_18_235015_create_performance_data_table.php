<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('performance_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->constrained();
            $table->decimal('batch_avg', 5, 2)->nullable();
            $table->string('platform_name')->nullable();
            $table->decimal('progress_percent', 5, 2)->nullable();
            $table->dateTime('operation_start')->nullable();
            $table->integer('operation_hours')->nullable();
            $table->integer('remaining_hours')->nullable();
            $table->integer('productivity')->nullable();
            $table->string('final_status')->nullable();
            $table->dateTime('last_updated')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('performance_data');
    }
};