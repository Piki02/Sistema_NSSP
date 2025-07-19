<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('file_number')->unique();
            $table->foreignId('vessel_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->string('operation_type');
            $table->decimal('quantity', 15, 2)->nullable();
            $table->string('product')->nullable();
            $table->string('terminal')->nullable();
            $table->string('port')->nullable();
            $table->enum('status', ['OPEN', 'CLOSE'])->default('OPEN');
            $table->enum('movement', ['DISCHARGE', 'LOAD']);
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('files');
    }
};
