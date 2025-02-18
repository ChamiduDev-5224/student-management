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
        Schema::create('student_courses', function (Blueprint $table) {
            $table->integerIncrements('id')->comment('Student Course Id');
            $table->integer('student_id')->unsigned()->index()->comment('Student Id');
            $table->tinyInteger('course_id')->unsigned()->index()->comment('Course Id');
            $table->timestamps();

              //relations
              $table->foreign('student_id')->references('id')->on('students')->onDelete('Restrict')->onUpdate('Cascade');
              $table->foreign('course_id')->references('id')->on('courses')->onDelete('Restrict')->onUpdate('Cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_courses');
    }
};
