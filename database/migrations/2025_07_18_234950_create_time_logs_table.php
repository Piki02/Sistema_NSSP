<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('time_logs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('file_id')->constrained()->onDelete('cascade');
        $table->date('log_date');
        $table->time('time');
        $table->string('activity')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}


    public function down(): void {
        Schema::dropIfExists('time_logs');
    }
};
