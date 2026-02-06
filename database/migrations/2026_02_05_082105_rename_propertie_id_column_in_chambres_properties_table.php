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
        Schema::table('chambres_properties', function (Blueprint $table) {
            $table->renameColumn('propertie_id', 'properties_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chambres_properties', function (Blueprint $table) {
            $table->renameColumn('properties_id', 'propertie_id');
        });
    }
};
