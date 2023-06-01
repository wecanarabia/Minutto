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
        Schema::create('official_vacations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('note');
            $table->date('from');
            $table->date('to');
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('official_vacations');
    }
};
