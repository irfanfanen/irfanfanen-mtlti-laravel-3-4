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
        Schema::table('excavators', function (Blueprint $table) {
            $table->string('latitude')->after('location');
            $table->string('longitude')->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('excavators', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
        });
    }
};