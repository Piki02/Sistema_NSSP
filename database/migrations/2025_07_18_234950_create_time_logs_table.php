<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('time_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->constrained();
            $table->date('log_date');
            $table->time('time');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('time_logs');
    }
};
