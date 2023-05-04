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
        Schema::table('leaves', function (Blueprint $table) {
            $table->foreignId('workhour_id')->nullable()->after('replay')->constrained('workhours')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::table('leaves', function (Blueprint $table) {
                $table->dropForeign(['workhour_id']);
            });
    
            Schema::table('leaves', function (Blueprint $table) {
                $table->dropColumn('workhour_id');
            });
    }
};
