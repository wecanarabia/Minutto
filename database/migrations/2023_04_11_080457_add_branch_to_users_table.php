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
            $table->string('last_name')->nullable();
            $table->string('image')->nullable();
            $table->string('code')->nullable();
            $table->string('career')->nullable();
            $table->boolean('active')->default(0);
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->boolean('is_pass')->default(0);
            $table->string('country')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('work_start')->nullable();
            $table->string('duration_of_contract')->nullable();
            $table->date('contract_expire')->nullable();
            $table->string('phone')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('account_number')->nullable();
            $table->integer('branch_id')->default(0);
            $table->integer('shift_id')->default(0);
            $table->integer('fingerprint_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
