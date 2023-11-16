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
        Schema::dropIfExists("workers");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('project_worker', function (Blueprint $table) {
            $table->id();
        });
    }
};
