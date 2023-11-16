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
        Schema::table('workers', function (Blueprint $table) {
            $table->foreignId('some_id')->index()->constrained('position')->cascadeOnDelete();
            $table->string('hobby')->nullable();
            $table->unique(['hobby','some_id']);
            $table->renameColumn('surname', 'second_name');
            $table->string('name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('workers', function (Blueprint $table) {
            $table->renameColumn('second_name', 'surname');
            $table->string('name')->nullable(false)->change();
            $table->dropUnique(['hobby','some_id']);
            $table->dropIndex(['some_id']);
            $table->dropForeign(['some_id']);
            $table->dropColumn('hobby');
        });
    }
};
