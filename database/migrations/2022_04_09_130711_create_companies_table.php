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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('code');
            $table->string('timezone');
            $table->integer('employees_count');
            $table->integer('leaves_count')->nullable();
            $table->integer('holidays_count');
            $table->integer('advanes_count')->nullable();
            $table->double('advances_percentage')->nullable();
            $table->datetime('subscription_end_date')->nullable();
            $table->foreignId('subscription_id')->nullable()->constrained('companies')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
