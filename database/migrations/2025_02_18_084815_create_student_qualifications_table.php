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
        Schema::create('student_qualifications', function (Blueprint $table) {
            $table->integerIncrements('id')->index()->comment('Student Qualification Id');
            $table->integer('student_id')->index()->unsigned()->comment('Student ID');
            $table->string('qualification',150);
            $table->timestamps();

            //relations
            $table->foreign('student_id')->references('id')->on('students')->onDelete('Restrict')->onUpdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_qualifications');
    }
};
