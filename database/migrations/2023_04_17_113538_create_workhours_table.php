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

        //localhost
        Schema::create('workhours', function (Blueprint $table) {
            $table->id();
            $table->time('time_attendance')->nullable();
            $table->time('time_departure')->nullable();
            $table->double('discount_value')->default(0);
            $table->text('note')->nullable();
            $table->string('file')->nullable();
            $table->string('status')->nullable();
            $table->string('replay')->nullable();
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workhours');
    }
};
