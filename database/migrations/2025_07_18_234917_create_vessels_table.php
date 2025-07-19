<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('vessels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('previous_name')->nullable();
            $table->year('built_year')->nullable();
            $table->string('built_by')->nullable();
            $table->string('hydrostatic_by')->nullable();
            $table->string('call_letters')->nullable();
            $table->string('shpyard_no')->nullable();
            $table->string('hull_no')->nullable();
            $table->date('dated_at')->nullable();
            $table->string('registry_port')->nullable();
            $table->string('flag')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('vessels');
    }
};
