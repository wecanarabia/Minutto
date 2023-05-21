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
        Schema::table('company_admins', function (Blueprint $table) {
            $table->foreignId('role_id')->nullable()->after('password')->constrained('roles')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_admins', function (Blueprint $table) {
            Schema::table('company_admins', function (Blueprint $table) {
                $table->dropForeign(['role_id']);
            });

            Schema::table('company_admins', function (Blueprint $table) {
                $table->dropColumn('role_id');
            });
        });
    }
};
