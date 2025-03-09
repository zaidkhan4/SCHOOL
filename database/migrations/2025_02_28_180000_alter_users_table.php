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
          $table->unsignedBigInteger('class_id');

            $table->foreign('class_id')
                  ->references('id')
                  ->on('classes')
                  ->onDelete('cascade')->nullable();


                  $table->unsignedBigInteger('academic_id');

                  $table->foreign('academic_id')
                        ->references('id')
                        ->on('academic_years')
                        ->onDelete('cascade')->nullable();


            $table->string('admission_date')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('dob')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign keys first
            $table->dropForeign(['class_id']);
            $table->dropForeign(['academic_id']);

            // Drop columns
            $table->dropColumn(['class_id', 'academic_id', 'admission_date', 'father_name', 'mobile', 'dob']);
        });
    }
};
