<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('time_logs', function (Blueprint $table) {
        $table->timestamps(); // agrega created_at y updated_at
    });
}

public function down()
{
    Schema::table('time_logs', function (Blueprint $table) {
        $table->dropTimestamps();
    });
}

};
