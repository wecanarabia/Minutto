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
        Schema::table('users', function (Blueprint $table) {
            $table->string('ipan')->nullable();
            $table->string('swift_number')->nullable();
            $table->string('nationality')->nullable();
            $table->string('address')->nullable();
            $table->string('national_identity')->nullable();
            $table->string('passport_identity')->nullable();
            $table->enum('gender',['male','female']);
            $table->string('marital_status')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('ipan');
            $table->dropColumn('swift_number');
            $table->dropColumn('nationality');
            $table->dropColumn('addrees');
            $table->dropColumn('national_identity');
            $table->dropColumn('passport_identity');
            $table->dropColumn('gender');
            $table->dropColumn('marital_status');
            $table->dropColumn('emergency_contact');
            $table->dropColumn('description');
        });
    }
};
