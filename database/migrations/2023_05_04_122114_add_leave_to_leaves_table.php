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

            $table->time('time_leave')->nullable();
            $table->time('time_back')->nullable();
            $table->double('discount_value')->default(0);
            $table->string('time_status')->nullable();
<<<<<<< HEAD
            $table->time('late_period')->nullable();
=======
            $table->integer('late_period')->nullable();
>>>>>>> 68be95f98b1f78d19ad1787510b0e63ea5a3e133


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leaves', function (Blueprint $table) {

            $table->dropColumn('time_leave');
            $table->dropColumn('time_back');
            $table->dropColumn('discount_value');
            $table->dropColumn('time_status');
            $table->dropColumn('late_period');

        });
    }
};
