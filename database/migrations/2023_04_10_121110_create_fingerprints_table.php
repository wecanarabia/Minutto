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
<<<<<<<< HEAD:database/migrations/2023_04_10_121110_create_fingerprints_table.php
        Schema::create('fingerprints', function (Blueprint $table) {
            $table->id();
            $table->string('name');
========
        Schema::create('introductions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('body');
>>>>>>>> 782210cd80b4d69dce5951464e8a404ba2922d73:database/migrations/2023_04_10_145924_create_introductions_table.php
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<<< HEAD:database/migrations/2023_04_10_121110_create_fingerprints_table.php
        Schema::dropIfExists('fingerprints');
========
        Schema::dropIfExists('introductions');
>>>>>>>> 782210cd80b4d69dce5951464e8a404ba2922d73:database/migrations/2023_04_10_145924_create_introductions_table.php
    }
};
