<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('stowage_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('file_id')->constrained();
            $table->integer('hold_number');
            $table->string('product');
            $table->decimal('quantity_onboard', 10, 2);
            $table->decimal('max_quantity', 10, 2);
            $table->decimal('percentage', 5, 2);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('stowage_plans');
    }
};
